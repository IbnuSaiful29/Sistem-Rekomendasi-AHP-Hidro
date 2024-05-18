<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatriksController extends Controller
{
    public function showComparisonForm()
    {
        $data['criteria'] = ['suhu', 'hidrologi', 'infrastruktur'];
        return view('matrix.comparison', $data);
    }

    public function processComparisonForm(Request $request)
    {
        // Proses data yang dikirim dari formulir
        // Misalnya, simpan data ke database atau lakukan perhitungan berdasarkan matriks perbandingan
        return redirect()->route('matrix.comparison')->with('success', 'Matrix comparison processed successfully!');
    }
}
