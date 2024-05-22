<?php

namespace App\Http\Controllers;
use App\Models\Criteria;
use App\Models\PairwiseCriteria;

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
        $data['tittle'] = 'Rangking Kriteria';
        return view('admin.perbandingan-kriteria.rangking-kriteria', $data);
    }


}
