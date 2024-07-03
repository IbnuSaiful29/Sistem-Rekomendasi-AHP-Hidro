<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Criteria;
use App\Models\CriteriaOption;
use App\Models\PairwiseCriteria;
use App\Models\PairwiseAlternative;
use App\Models\RatioIndex;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['tittle'] = 'Data Alternative';
        $data['alternatif'] = Alternatif::all();

        return view('admin.alternative.alternative-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['tittle'] = 'Data Alternatif';
        return view('admin.alternative.alternative-add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $saveData = [
            'nama_alternatif' => $request->alternative_name,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Simpan data pengguna ke dalam tabel
        Alternatif::create($saveData);

        return redirect()->route('alternative');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_alternative = Alternatif::where('id', $id)->get();
        $data['data_alternative'] = $data_alternative;

        $data['tittle'] = 'Data Alternatif';
        return view('admin.alternative.alternative-show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data_alternative = Alternatif::where('id', $id)->get();
        $data['data_alternative'] = $data_alternative;

        $data['tittle'] = 'Data Alternatif';
        return view('admin.alternative.alternative-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'alternative_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Cari alternatif berdasarkan ID
        $alternative = Alternatif::findOrFail($request->alternative_id);

        // Perbarui data alternatif
        $alternative->nama_alternatif = $request->alternative_name;
        $alternative->description = $request->description;
        $alternative->updated_at = now();

        // Simpan perubahan
        $alternative->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('alternative')->with('success', 'Alternatif berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari alternatif berdasarkan ID
        $alternative = Alternatif::findOrFail($id);

        // Ambil semua data PairwiseAlternative yang terkait dengan alternative_id
        $pairwiseComparisons = PairwiseAlternative::where('alternative_id', $id)->get();

        // Cek apakah ada data PairwiseAlternative terkait
        if ($pairwiseComparisons->isNotEmpty()) {
            // Hapus semua data PairwiseAlternative terkait
            foreach ($pairwiseComparisons as $pairwise) {
                $pairwise->delete();
            }
        }

        // Hapus data alternatif
        $alternative->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('alternative')->with('success', 'Alternatif dan data terkait berhasil dihapus.');
    }

    public function pairwiseComparison()
    {
        $data_criteria = Criteria::all();
        $data['criteria'] = $data_criteria;
        $data_alternative = Alternatif::all();
        $data['alternative'] = $data_alternative;
        $data_pairwise = PairwiseAlternative::all();
        $data['pairwise'] = $data_pairwise;
        $data['tittle'] = 'Perbandingan Alternatif';
        return view('admin.perbandingan-alternative.perbandingan-alternative', $data);
    }

    public function EditPairwiseComparison($id)
    {
        $data_alternative = Alternatif::find($id);
        $data_criteria = Criteria::all();
        $data_pairwise = PairwiseAlternative::where('alternative_id', $id)->get();
        $data_criteria_option = [];
        foreach ($data_criteria as $item_criteria) {
            $id_criteria = $item_criteria->id;
            $data_option = CriteriaOption::where('id_criteria', $id_criteria)->get();

            $criteria_options = [];
            foreach ($data_option as $item_option) {
                $criteria_options[$item_option->option] = $item_option->value;
            }

            $data_criteria_option[$item_criteria->id] = [
                'name' => $item_criteria->nama_kriteria,
                'options' => $criteria_options
            ];
        }

        $data['data_criteria_option'] = $data_criteria_option;
        $data['alternative'] = $data_alternative;
        $data['criteria'] = $data_criteria;
        $data['pairwise'] = $data_pairwise;
        $data['tittle'] = 'Perbandingan Alternative';
        return view('admin.perbandingan-alternative.edit-perbandingan-alternatif', $data);
    }
    // public function EditPairwiseComparison($id)
    // {
    //     $data_criteria = Criteria::all();
    //     $data_pairwise = PairwiseAlternative::all();
    //     $data_alternative = Alternatif::all();
    //     $data['alternative'] = $data_alternative;
    //     $data['criteria'] = $data_criteria;
    //     $data['pairwise'] = $data_pairwise;
    //     // $data['criteria'] = ['suhu', 'hidrologi', 'infrastruktur'];
    //     $data['tittle'] = 'Perbandingan Alternative';
    //     return view('admin.perbandingan-alternative.edit-perbandingan-alternatif', $data);
    // }

    // public function editSavePairwiseComparison(Request $request, $id){

    //     $matrix = $request->input('matrix');
    //     foreach ($matrix as $rowCriterionId => $colCriteria) {
    //         foreach ($colCriteria as $colCriterionId => $value) {
    //             PairwiseAlternative::updateOrCreate(
    //                 [
    //                     'alternative_id' => $rowCriterionId,
    //                     'criteria_id' => $colCriterionId,
    //                 ],
    //                 [
    //                     'value' => $value,
    //                 ]
    //             );
    //         }
    //     }

    //     return response()->json(['message' => 'Data berhasil disimpan'], 200);
    // }

    public function editSavePairwiseComparison(Request $request, $id)
    {
        $criteria = Criteria::all();

        foreach ($criteria as $criterion) {
            $value = $request->input('value_' . $criterion->id);
            $pairwise = PairwiseAlternative::where('alternative_id', $id)->where('criteria_id', $criterion->id)->first();

            if ($pairwise) {
                $pairwise->value = $value;
                $pairwise->save();
            } else {
                PairwiseAlternative::create([
                    'alternative_id' => $id,
                    'criteria_id' => $criterion->id,
                    'value' => $value
                ]);
            }
        }

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    public function compareAlternatives($criteria)
    {
        $id_criteria = $criteria;
        $alternatives = PairwiseAlternative::where('criteria_id', $id_criteria)->get();

        $criteria = Criteria::find($id_criteria);
        $type = $criteria->type; // Misalkan kolom 'is_benefit' ada pada tabel 'criteria'

        // Build the pairwise comparison matrix
        $comparisonMatrix = $this->buildComparisonMatrix($alternatives, $type);
        $normalizedMatrix = $this->normalizeMatrix($comparisonMatrix);

        // dd($normalizedMatrix);

        // Calculate weights
        $weights = $this->calculateWeights($normalizedMatrix);

        $dataWeights = [];

        foreach ($weights as $idAlternatif => $value) {
            // Cari alternatif berdasarkan ID
            $data_alternatif = Alternatif::where('id', $idAlternatif)->first();
            // Dapatkan nama alternatif
            $nama_alternatif = $data_alternatif->nama_alternatif;
            // Tambahkan ke array asosiatif
            $dataWeights[] = [
                'nama_alternatif' => $nama_alternatif,
                'bobot' => $value
            ];
        }

        // echo '<pre>';
        // print_r($dataWeights);
        // die;

        $tittle = "Rangking Alternatif berdasarkan Kriteria";

        // dd($consistencyRatio);
        return view('admin.perbandingan-alternative.rangking-alternatif', compact('alternatives', 'dataWeights', 'comparisonMatrix', 'normalizedMatrix', 'weights', 'tittle'));

    }

    protected function buildComparisonMatrix($alternatives, $isBenefit)
    {
        $alternativesGrouped = $alternatives->groupBy('alternative_id');
        $alternativeIds = $alternativesGrouped->keys()->all();
        $matrix = [];

        foreach ($alternativeIds as $rowAltId) {
            $row = [];
            foreach ($alternativeIds as $colAltId) {
                if ($rowAltId == $colAltId) {
                    $row[$colAltId] = 1; // Perbandingan diri sendiri harus 1
                } else {
                    $value1 = $alternativesGrouped[$rowAltId]->first()->value;
                    $value2 = $alternativesGrouped[$colAltId]->first()->value;
                    $row[$colAltId] = $this->compareValues($value1, $value2, $isBenefit);
                }
            }
            $matrix[$rowAltId] = $row;
        }
        return $matrix;
    }


    protected function compareValues($value1, $value2, $isBenefit)
    {
        if ($isBenefit == 'Benefit') {
            if ($value1 == $value2) {
                return 1;
            } else {
                return $value1 / $value2;
            }
        } else {
            if ($value1 == $value2) {
                return 1;
            } else {
                return $value2 / $value1;
            }
        }
    }

    protected function compareTemperature($temp1, $temp2, $idealTemperature)
    {
        $diff1 = abs($idealTemperature - $temp1);
        $diff2 = abs($idealTemperature - $temp2);
        return $diff1 > $diff2 ? $diff2 / $diff1 : $diff1 / $diff2;
    }

    protected function normalizeMatrix($matrix)
    {
          // Inisialisasi array untuk menyimpan jumlah kolom
        $sumColumns = [];

        // Hitung jumlah kolom
        foreach ($matrix as $row) {
            foreach ($row as $colId => $value) {
                if (!isset($sumColumns[$colId])) {
                    $sumColumns[$colId] = 0;
                }
                $sumColumns[$colId] += $value;
            }
        }

        // Normalisasi matriks
        $normalizedMatrix = [];
        foreach ($matrix as $altId => $row) {
            $normalizedRow = [];
            foreach ($row as $colId => $value) {
                if ($sumColumns[$colId] == 0) {
                    throw new \Exception('Error pembagian dengan nol: jumlah kolom nol.');
                }
                $normalizedRow[$colId] = $value / $sumColumns[$colId];
            }
            $normalizedMatrix[$altId] = $normalizedRow;
        }

        return $normalizedMatrix;
    }

    protected function calculateWeights($normalizedMatrix)
    {
        $weights = [];
        // dd($normalizedMatrix);
        foreach ($normalizedMatrix as $alternatifId => $row) {
            $weights[$alternatifId] = array_sum($row) / count($row);
        }
        return $weights;
    }

    // protected function calculateLambdaMax($comparisonMatrix, $weights)
    // {
    //     $lambdaMax = 0;
    //     for ($i = 0; $i < count($comparisonMatrix); $i++) {
    //         $rowSum = 0;
    //         for ($j = 0; $j < count($comparisonMatrix); $j++) {
    //             $rowSum += $comparisonMatrix[$i][$j] * $weights[$j];
    //         }
    //         $lambdaMax += $rowSum / $weights[$i];
    //     }
    //     return $lambdaMax / count($comparisonMatrix);
    // }

    protected function calculateLambdaMax($comparisonMatrix, $weights)
    {
        $lambdaMax = 0;
        $n = count($comparisonMatrix); // Ukuran matriks
        for ($i = 1; $i <= $n; $i++) {
            $rowSum = 0;
            for ($j = 1; $j <= $n; $j++) {
                $rowSum += $comparisonMatrix[$i][$j] * $weights[$j - 1]; // Indeks -1 karena array dimulai dari 0
            }
            $lambdaMax += $rowSum / $weights[$i - 1]; // Indeks -1 karena array dimulai dari 0
        }
        return $lambdaMax / $n;
    }

    protected function getRandomIndex($matrixSize)
    {
        $ratioIndex = RatioIndex::where('matrix', $matrixSize)->first();

        if ($ratioIndex) {
            return $ratioIndex->nilai_ratio;
        } else {
            // Default value if ratio index is not found in the database
            return 0.00;
        }
    }

    public function compareAlternativesAll()
    {
        // Ambil semua kriteria
        $criteriaIds = Criteria::pluck('id')->toArray();

        // Ambil semua alternatif
        $alternatives = PairwiseAlternative::all();

        $criteria = Criteria::all();
        $pairwiseComparisonsCriteria = PairwiseCriteria::all();

        // $matrixSize = $criteria->count();
        $comparisonMatrixCriteria = $this->buildComparisonMatrixCriteria($pairwiseComparisonsCriteria, $criteria);
        $normalizedMatrixCriteria = $this->normalizeMatrixCriteria($comparisonMatrixCriteria);
        // dd($normalizedMatrix);
        $weightsCriteria = $this->calculateWeightsCriteria($normalizedMatrixCriteria);

        // Bangun matriks perbandingan untuk seluruh kriteria
        $comparisonMatrices = [];
        foreach ($criteriaIds as $criterionId) {
            $criteria = Criteria::find($criterionId);
            // Ambil semua alternatif
            $alternative = PairwiseAlternative::where('criteria_id', $criterionId)->get();
            $type = $criteria->type;
            $comparisonMatrices[$criterionId] = $this->buildComparisonMatrix($alternative, $type);
        }

        $normalizedMatrices = $this->normalizeAllMatrices($comparisonMatrices);

        // Hitung bobot
        $weights = $this->calculateWeightsAll($normalizedMatrices);

        $totalWeights = $this->calculateTotalWeights($weights, $weightsCriteria);

        // Normalisasi bobot total alternatif
        $normalizedTotalWeights = $this->normalizeTotalWeights($totalWeights);

        $rankedAlternativesAll = $this->rankAlternativesAll($normalizedTotalWeights);

        // echo '<pre>';
        // print_r($rankedAlternativesAll);
        // die;

        $tittle = "Rangking Alternatif";

        // Kirim data ke tampilan
        return view('admin.perbandingan-alternative.rangking-alternatif-all', compact('alternatives', 'weights', 'tittle','rankedAlternativesAll'));
    }

    protected function combineMatrices($matrices)
    {
        $combinedMatrix = [];
        foreach ($matrices as $matrix) {
            foreach ($matrix as $rowIndex => $row) {
                foreach ($row as $colIndex => $value) {
                    if (!isset($combinedMatrix[$rowIndex][$colIndex])) {
                        $combinedMatrix[$rowIndex][$colIndex] = 1;
                    }
                    $combinedMatrix[$rowIndex][$colIndex] *= $value;
                }
            }
        }
        return $combinedMatrix;
    }

    public function normalizeAllMatrices($comparisonMatrices)
    {
        $normalizedMatrices = [];

        // Normalisasi setiap matriks
        foreach ($comparisonMatrices as $criterionId => $matrix) {
            // return $matrix;
            $normalizedMatrices[$criterionId] = $this->normalizeMatrix($matrix);
        }

        return $normalizedMatrices;
    }

    public function calculateWeightsAll($normalizedMatrices)
    {
        $weights = [];

        // Normalisasi setiap matriks
        foreach ($normalizedMatrices as $criterionId => $matrix) {
            // return $matrix;
            $weights[$criterionId] = $this->calculateWeights($matrix);
        }

        // dd($normalizedMatrices);

        return $weights;
    }

    // private function buildComparisonMatrixCriteria($pairwiseComparisons, $criteria)
    // {
    //     $matrix = [];
    //     foreach ($criteria as $rowCriterion) {
    //         $row = [];
    //         foreach ($criteria as $colCriterion) {
    //             $comparison = $pairwiseComparisons->where('criterion_row_id', $rowCriterion->id)
    //                                                ->where('criterion_col_id', $colCriterion->id)
    //                                                ->first();
    //             $row[] = $comparison ? $comparison->value : 1;
    //         }
    //         $matrix[] = $row;
    //     }
    //     return $matrix;
    // }

    // private function normalizeMatrixCriteria($matrix)
    // {
    //     $columnSums = array_fill(0, count($matrix), 0);
    //     foreach ($matrix as $row) {
    //         foreach ($row as $colIndex => $value) {
    //             $columnSums[$colIndex] += $value;
    //         }
    //     }

    //     // Debugging: Output column sums
    //     logger()->info('Column Sums: ', $columnSums);

    //     $normalizedMatrix = [];
    //     foreach ($matrix as $row) {
    //         $normalizedRow = [];
    //         foreach ($row as $colIndex => $value) {
    //             $normalizedRow[] = $columnSums[$colIndex] != 0 ? $value / $columnSums[$colIndex] : 0; // Avoid division by zero
    //         }
    //         $normalizedMatrix[] = $normalizedRow;
    //     }

    //     // Debugging: Output normalized matrix
    //     logger()->info('Normalized Matrix: ', $normalizedMatrix);

    //     return $normalizedMatrix;
    // }

    // private function calculateWeightsCriteria($normalizedMatrix)
    // {
    //     $weights = [];
    //     foreach ($normalizedMatrix as $row) {
    //         $weights[] = array_sum($row) / count($row);
    //     }

    //     // Debugging: Output weights
    //     logger()->info('Weights: ', $weights);

    //     return $weights;
    // }

    private function buildComparisonMatrixCriteria($pairwiseComparisons, $criteria)
    {
        $matrix = [];
        $criteriaIds = $criteria->pluck('id')->toArray();

        foreach ($criteriaIds as $rowCriterionId) {
            $row = [];
            foreach ($criteriaIds as $colCriterionId) {
                $comparison = $pairwiseComparisons->where('criterion_row_id', $rowCriterionId)
                                                ->where('criterion_col_id', $colCriterionId)
                                                ->first();
                $row[$colCriterionId] = $comparison ? $comparison->value : 1;
            }
            $matrix[$rowCriterionId] = $row;
        }

        return $matrix;
    }

    private function normalizeMatrixCriteria($matrix)
    {
        $columnSums = [];
        foreach ($matrix as $row) {
            foreach ($row as $colIndex => $value) {
                if (!isset($columnSums[$colIndex])) {
                    $columnSums[$colIndex] = 0;
                }
                $columnSums[$colIndex] += $value;
            }
        }

        // Debugging: Output column sums
        logger()->info('Column Sums: ', $columnSums);

        $normalizedMatrix = [];
        foreach ($matrix as $rowIndex => $row) {
            $normalizedRow = [];
            foreach ($row as $colIndex => $value) {
                $normalizedRow[$colIndex] = $columnSums[$colIndex] != 0 ? $value / $columnSums[$colIndex] : 0; // Avoid division by zero
            }
            $normalizedMatrix[$rowIndex] = $normalizedRow;
        }

        // Debugging: Output normalized matrix
        logger()->info('Normalized Matrix: ', $normalizedMatrix);

        return $normalizedMatrix;
    }

    private function calculateWeightsCriteria($normalizedMatrix)
    {
        $weights = [];
        foreach ($normalizedMatrix as $rowIndex => $row) {
            $weights[$rowIndex] = array_sum($row) / count($row);
        }

        // Debugging: Output weights
        logger()->info('Weights: ', $weights);

        return $weights;
    }


    protected function calculateTotalWeights($alternativeWeights, $criteriaWeights)
    {
        $totalWeights = [];

        foreach ($alternativeWeights as $criterionId => $weights) {
            foreach ($weights as $index => $weight) {
                if (!isset($totalWeights[$index])) {
                    $totalWeights[$index] = 0;
                }
                $totalWeights[$index] += $weight * $criteriaWeights[$criterionId];
            }
        }

        return $totalWeights;
    }

    protected function normalizeTotalWeights($totalWeights)
    {
        $sumTotalWeights = array_sum($totalWeights);
        $normalizedTotalWeights = [];

        foreach ($totalWeights as $index => $weight) {
            $normalizedTotalWeights[$index] = $weight / $sumTotalWeights;
        }

        return $normalizedTotalWeights;
    }

    protected function rankAlternativesAll($normalizedTotalWeights)
    {
        // Gabungkan bobot total yang dinormalisasi dengan label alternatif
        $rankedAlternatives = [];
        foreach ($normalizedTotalWeights as $idAlternatif => $weight) {
            $data_alternatif = Alternatif::where('id', $idAlternatif)->first();
            $rankedAlternatives[$idAlternatif] = [
                'id' => $idAlternatif,
                'nama_alternatif' => $data_alternatif->nama_alternatif,
                'weight' => $weight,
            ];
        }

        // Urutkan alternatif berdasarkan bobot dari yang tertinggi ke terendah
        usort($rankedAlternatives, function($a, $b) {
            return $b['weight'] <=> $a['weight'];
        });
        return $rankedAlternatives;
    }


}
