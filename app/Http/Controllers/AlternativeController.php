<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Criteria;
use App\Models\PairwiseCriteria;
use App\Models\PairwiseAlternative;

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

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data_roles = Roles::all();
        $data['roles'] = $data_roles;

        $data_user = User::where('id', $id)->get();
        $data['data_user'] = $data_user;

        $data['tittle'] = 'Data User';
        return view('admin.user.user-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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

    public function EditPairwiseComparison()
    {
        $data_criteria = Criteria::all();
        $data_pairwise = PairwiseAlternative::all();
        $data_alternative = Alternatif::all();
        $data['alternative'] = $data_alternative;
        $data['criteria'] = $data_criteria;
        $data['pairwise'] = $data_pairwise;
        // $data['criteria'] = ['suhu', 'hidrologi', 'infrastruktur'];
        $data['tittle'] = 'Perbandingan Alternative';
        return view('admin.perbandingan-alternative.edit-perbandingan-alternatif', $data);
    }

    public function editSavePairwiseComparison(Request $request){
        $matrix = $request->input('matrix');
        foreach ($matrix as $rowCriterionId => $colCriteria) {
            foreach ($colCriteria as $colCriterionId => $value) {
                PairwiseAlternative::updateOrCreate(
                    [
                        'alternative_id' => $rowCriterionId,
                        'criteria_id' => $colCriterionId,
                    ],
                    [
                        'value' => $value,
                    ]
                );
            }
        }

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }
}
