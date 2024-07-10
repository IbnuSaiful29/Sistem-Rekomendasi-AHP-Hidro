<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Criteria;
use App\Models\CriteriaOption;
use App\Models\PairwiseCriteria;
use App\Models\PairwiseAlternative;
use App\Models\RatioIndex;
use App\Models\Village;
use App\Models\HistoriCekRekomendasi;
use App\Models\HistoriPenangananCriteria;
use App\Models\HistoriPenangananAlternatif;
use Illuminate\Support\Facades\DB;

class CekRekomendasiController extends Controller
{
    public function index(){
        $data_desa = Village::all();
        $data_criteria = Criteria::all();
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

        $data['data_criteria'] = $data_criteria;
        $data['data_desa'] = $data_desa;
        $data['data_criteria_option'] = $data_criteria_option;
        $data['tittle'] = 'Cek Rekomendasi';
        return view('front.cek-rekomendasi-penanganan', $data);
    }

    public function storeBestValues(Request $request)
    {
        // Validasi input sesuai kebutuhan
        $request->validate([
            'best_values' => 'required|array',
            'best_values.*' => 'required|numeric', // Misalnya, validasi setiap nilai sebagai numerik
        ]);

        // Simpan nilai terbaik di session
        $request->session()->put('best_values', $request->best_values);

        // Redirect ke halaman hasil rekomendasi
        return redirect()->route('checkRecomendation');
    }


    public function checkRecomendation(Request $request){


        $bestValues = $request->best_values;
        // dd($bestValues);
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
        $comparisonMatrices = [];
        foreach ($criteriaIds as $criterionId) {
            $alternative = PairwiseAlternative::where('criteria_id', $criterionId)->get();
            $comparisonMatrices[$criterionId] = $this->buildComparisonMatrixWithBestValue($alternative, $criterionId, $bestValues[$criterionId]);
        }


        $normalizedMatrices = $this->normalizeAllMatrices($comparisonMatrices);

        // dd($normalizedMatrices);

        // Hitung bobot
        $weights = $this->calculateWeightsAll($normalizedMatrices);

        $totalWeights = $this->calculateTotalWeights($weights, $weightsCriteria);

        // // Normalisasi bobot total alternatif
        $normalizedTotalWeights = $this->normalizeTotalWeights($totalWeights);

        $rankedAlternativesAll = $this->rankAlternativesAll($normalizedTotalWeights);

        // dd($rankedAlternativesAll);

        $data['rankedAlternativesAll'] =  $rankedAlternativesAll;

        DB::beginTransaction();

        $save_data_histori = [
            'id_desa' => $request->desa,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $save_histori = HistoriCekRekomendasi::create($save_data_histori);

        $id_histori = $save_histori->id;
        $max_count = 5;
        $count = 0;
        $peringkat = 1;

        foreach ($bestValues as $id_criteria_best_value => $best_value_criteria) {
            $save_data_histori_criteria = [
                'id_hasil_penanganan' => $id_histori,
                'id_criteria' => $id_criteria_best_value,
                'value' => $best_value_criteria,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $histori_save_criteria = HistoriPenangananCriteria::create($save_data_histori_criteria);
        }

        foreach ($rankedAlternativesAll as $index => $alternative_item) {
            if ($count >= $max_count) {
                break;
            }
            $save_data_histori_alternatif = [
                'id_hasil_penanganan' => $id_histori,
                'id_alternative' => $alternative_item['id'],
                'peringkat' => $index + 1,
                'weight' => $alternative_item['weight'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $histori_save_criteria = HistoriPenangananAlternatif::create($save_data_histori_alternatif);

            $count++;
        }

        DB::commit();

        $data['tittle'] = 'Cek Rekomendasi';
        return view('front.hasil-rekomendasi', $data);
    }

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

    protected function buildComparisonMatrixWithBestValue($alternatives, $criterionId, $bestValue)
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
                    $value1 = $alternativesGrouped[$rowAltId]->where('criteria_id', $criterionId)->first()->value;
                    $value2 = $alternativesGrouped[$colAltId]->where('criteria_id', $criterionId)->first()->value;
                    $row[$colAltId] = $this->compareValuesWithBestValue($value1, $value2, $bestValue);
                }
            }
            $matrix[$rowAltId] = $row;
        }
        return $matrix;
    }

    protected function compareValuesWithBestValue($value1, $value2, $bestValue)
    {
        $distance1 = abs($value1 - $bestValue);
        $distance2 = abs($value2 - $bestValue);

         // Cek jika distance1 adalah nol untuk menghindari pembagian dengan nol
        if ($distance1 == 0) {
            if ($distance2 == 0) {
                // Jika kedua distance1 dan distance2 nol, berarti keduanya sama dengan bestValue
                return 1; // atau nilai yang logis sesuai konteks Anda
            } else {
                // Jika hanya distance1 yang nol, artinya value1 adalah nilai terbaik
                return PHP_INT_MAX; // atau nilai sangat besar untuk menandakan bahwa value1 adalah terbaik
            }
        }

        return $distance2 / $distance1;
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

    protected function calculateWeights($normalizedMatrix)
    {
        $weights = [];
        // dd($normalizedMatrix);
        foreach ($normalizedMatrix as $alternatifId => $row) {
            $weights[$alternatifId] = array_sum($row) / count($row);
        }
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
                'description' => $data_alternatif->description,
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
