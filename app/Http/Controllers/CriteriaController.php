<?php

namespace App\Http\Controllers;
use App\Models\Criteria;
use App\Models\PairwiseCriteria;
use App\Models\PairwiseAlternative;
use App\Models\RatioIndex;
use App\Models\CriteriaOption;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tittle'] = 'Data Criteria';
        $data['criteria'] = Criteria::all();

        return view('admin.criteria.criteria-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['tittle'] = 'Data Criteria';
        return view('admin.criteria.criteria-add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $saveData = [
            'nama_kriteria' => $request->criteria_name,
            'type' => $request->type,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // dd($saveData);
        // die;

        // Simpan data pengguna ke dalam tabel
        Criteria::create($saveData);

        return redirect()->route('criteria');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data_criteria = Criteria::where('id', $id)->get();
        $data_option = CriteriaOption::where('id_criteria', $id)->get();
        // dd($data_criteria);
        $data['data_criteria'] = $data_criteria;
        $data['data_option'] = $data_option;

        $data['tittle'] = 'Edit Criteria';
        return view('admin.criteria.criteria-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request);
        // Validate the incoming request data
        $request->validate([
            'criteria_name' => 'required|string|max:255',
            'type' => 'required|string|in:Benefit,Cost',
        ]);

        // Retrieve the criteria by ID
        $criteria = Criteria::findOrFail($request->criteria_id);

        DB::beginTransaction();

        // Update the criteria's data
        $criteria->nama_kriteria = $request->criteria_name;
        $criteria->type = $request->type;

        // Save the updated criteria
        $criteria->save();

        $id_criteria = $criteria->id;
        $option_name = $request->option_name;
        $option_value = $request->option;
        CriteriaOption::where('id_criteria', $id_criteria)->delete();
        foreach ($option_name as $index => $item_name) {
                $save_data = [
                    'id_criteria' => $id_criteria,
                    'option' => $item_name,
                    'value' => $option_value[$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                CriteriaOption::create($save_data);
        }

        DB::commit();

        // Redirect back with a success message
        return redirect()->route('criteria')->with('success', 'Criteria updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        $criteria = Criteria::findOrFail($id);
        $pairwiseComparisonsAlternative = PairwiseAlternative::where('criteria_id', $id)->get();
        $pairwiseComparisonsCriteriaCol = PairwiseCriteria::where('criterion_col_id', $id)->get();
        $pairwiseComparisonsCriteriaRow = PairwiseCriteria::where('criterion_row_id', $id)->get();

        // dd($pairwiseComparisonsCriteriaRow);

        if ($pairwiseComparisonsAlternative->isNotEmpty()) {
            foreach ($pairwiseComparisonsAlternative as $pairwise) {
                $pairwise->delete();
            }
        }

        if ($pairwiseComparisonsCriteriaCol->isNotEmpty()) {
            foreach ($pairwiseComparisonsCriteriaRow as $pairwise) {
                $pairwise->delete();
            }
        }

        if ($pairwiseComparisonsCriteriaRow->isNotEmpty()) {
            foreach ($pairwiseComparisonsCriteriaRow as $pairwise) {
                $pairwise->delete();
            }
        }

        $criteria->delete();
        DB::commit();
        return redirect()->route('criteria')->with('success', 'Criteria dan data terkait berhasil dihapus.');

    }

    public function pairwiseComparison()
    {
        $data_criteria = Criteria::all();
        $data_pairwise = PairwiseCriteria::all();
        $data['criteria'] = $data_criteria;
        $data['pairwise'] = $data_pairwise;
        // $data['criteria'] = ['suhu', 'hidrologi', 'infrastruktur'];
        $data['tittle'] = 'Perbandingan Kriteria';
        return view('admin.perbandingan-kriteria.perbandingan-kriteria-berpasangan', $data);
    }

    public function EditPairwiseComparison()
    {
        $data_criteria = Criteria::all();
        $data_pairwise = PairwiseCriteria::all();
        $data['criteria'] = $data_criteria;
        $data['pairwise'] = $data_pairwise;
        // $data['criteria'] = ['suhu', 'hidrologi', 'infrastruktur'];
        $data['tittle'] = 'Perbandingan Kriteria';
        return view('admin.perbandingan-kriteria.edit-perbandingan-kriteria', $data);
    }


    public function editSavePairwiseComparison(Request $request)
    {
        $matrix = $request->input('matrix');
        foreach ($matrix as $rowCriterionId => $colCriteria) {
            foreach ($colCriteria as $colCriterionId => $value) {
                PairwiseCriteria::updateOrCreate(
                    [
                        'criterion_row_id' => $rowCriterionId,
                        'criterion_col_id' => $colCriterionId,
                    ],
                    [
                        'value' => $value,
                    ]
                );
            }
        }

        return response()->json(['message' => 'Data berhasil disimpan'], 200);

    }

    public function rangkingCriteria(){
        $data_criteria = Criteria::all();

        $data['tittle'] = 'Rangking Kriteria';
        return view('admin.perbandingan-kriteria.rangking-kriteria', $data);
    }

    public function showNormalizedMatrix()
    {
        $tittle = "Rangking Kriteria";
        $criteria = Criteria::all();
        $pairwiseComparisons = PairwiseCriteria::all();

        $matrixSize = $criteria->count();
        $comparisonMatrix = $this->buildComparisonMatrix($pairwiseComparisons, $criteria);
        $normalizedMatrix = $this->normalizeMatrix($comparisonMatrix);
        // dd($normalizedMatrix);
        $weights = $this->calculateWeights($normalizedMatrix);
        $lambdaMax = $this->calculateLambdaMax($comparisonMatrix, $weights);
        $consistencyIndex = ($lambdaMax - $matrixSize) / ($matrixSize - 1);
        $randomIndex = $this->getRandomIndex($matrixSize);
        $consistencyRatio = $randomIndex > 0 ? $consistencyIndex / $randomIndex : 0; // Avoid division by zero
        $rankedCriteria = $this->rankCriteria($weights);

        // dd($rankedCriteria);

        return view('admin.perbandingan-kriteria.rangking-kriteria', compact('tittle','lambdaMax', 'consistencyIndex', 'consistencyRatio','rankedCriteria'));
    }

    private function buildComparisonMatrix($pairwiseComparisons, $criteria)
    {
        $matrix = [];
        foreach ($criteria as $rowCriterion) {
            $row = [];
            foreach ($criteria as $colCriterion) {
                $comparison = $pairwiseComparisons->where('criterion_row_id', $rowCriterion->id)
                                                   ->where('criterion_col_id', $colCriterion->id)
                                                   ->first();
                $row[] = $comparison ? $comparison->value : 1;
            }
            $matrix[] = $row;
        }
        return $matrix;
    }

    private function normalizeMatrix($matrix)
    {
        $columnSums = array_fill(0, count($matrix), 0);
        foreach ($matrix as $row) {
            foreach ($row as $colIndex => $value) {
                $columnSums[$colIndex] += $value;
            }
        }

        // Debugging: Output column sums
        logger()->info('Column Sums: ', $columnSums);

        $normalizedMatrix = [];
        foreach ($matrix as $row) {
            $normalizedRow = [];
            foreach ($row as $colIndex => $value) {
                $normalizedRow[] = $columnSums[$colIndex] != 0 ? $value / $columnSums[$colIndex] : 0; // Avoid division by zero
            }
            $normalizedMatrix[] = $normalizedRow;
        }

        // Debugging: Output normalized matrix
        logger()->info('Normalized Matrix: ', $normalizedMatrix);

        return $normalizedMatrix;
    }

    private function calculateWeights($normalizedMatrix)
    {
        $weights = [];
        foreach ($normalizedMatrix as $row) {
            $weights[] = array_sum($row) / count($row);
        }

        // Debugging: Output weights
        logger()->info('Weights: ', $weights);

        return $weights;
    }

    private function calculateLambdaMax($matrix, $weights)
    {
        $weightedSumMatrix = [];
        foreach ($matrix as $row) {
            $weightedSumRow = 0;
            foreach ($row as $colIndex => $value) {
                $weightedSumRow += $value * $weights[$colIndex];
            }
            $weightedSumMatrix[] = $weightedSumRow;
        }

        $lambdaMax = 0;
        foreach ($weightedSumMatrix as $index => $value) {
            $lambdaMax += $weights[$index] != 0 ? $value / $weights[$index] : 0; // Avoid division by zero
        }
        return $lambdaMax / count($matrix);
    }

    private function getRandomIndex($matrixSize)
    {
        $ratioIndex = RatioIndex::where('matrix', $matrixSize)->first();

        return $ratioIndex ? $ratioIndex->nilai_ratio : 1.45; // Default value for larger matrices
    }

    protected function rankCriteria($weights)
    {
        $criteria = Criteria::all();
        $rankedCriteria = [];

        foreach ($criteria as $index => $criterion) {
            $rankedCriteria[] = [
                'name' => $criterion->nama_kriteria,
                'weight' => $weights[$index],
            ];
        }

        usort($rankedCriteria, function($a, $b) {
            return $b['weight'] <=> $a['weight'];
        });

        return $rankedCriteria;
    }



}
