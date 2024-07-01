<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;
use Illuminate\Validation\Rule;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_desa = Village::all();
        $data['village'] = $data_desa;
        $data['tittle'] = 'Data Desa';
        return view('admin.data-desa.desa-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['tittle'] = 'Data Desa';
        return view('admin.data-desa.desa-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'desa_name' => [
                'required',
                Rule::unique('village', 'nama_desa')->where(function ($query) use ($request) {
                    return $query->where('nama_kecamatan', $request->kecamatan_name)
                                 ->where('nama_kabupaten', $request->kabupaten_name);
                }),
            ],
            'kabupaten_name' => 'required',
            'kecamatan_name' => 'required',
        ]);

        $save_data_village = [
            'nama_kabupaten' => $request->kabupaten_name,
            'nama_kecamatan' => $request->kecamatan_name,
            'nama_desa' => $request->desa_name,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // dd($save_data_village);
        Village::create($save_data_village);

        return redirect()->route('village')->with('success', 'Data desa berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_desa = Village::where('id', $id)->first();
        $data['village'] = $data_desa;
        $data['tittle'] = 'Data Desa';
        return view('admin.data-desa.desa-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id =  $request->id;
        $village = Village::findOrFail($id);

        $request->validate([
            'desa_name' => [
                'required',
                Rule::unique('village', 'nama_desa')->where(function ($query) use ($request) {
                    return $query->where('nama_kecamatan', $request->kecamatan_name)
                                 ->where('nama_kabupaten', $request->kabupaten_name);
                })->ignore($village->id),
            ],
            'kabupaten_name' => 'required',
            'kecamatan_name' => 'required',
        ]);

        $save_data_village = [
            'nama_kabupaten' => $request->kabupaten_name,
            'nama_kecamatan' => $request->kecamatan_name,
            'nama_desa' => $request->desa_name,
            'updated_at' => now(),
        ];

        $village->update($save_data_village);

        return redirect()->route('village')->with('success', 'Data desa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $village = Village::findOrFail($id);
        $village->delete();

        return response()->json(['success' => 'Data desa dan data terkait berhasil dihapus.']);

    }
}
