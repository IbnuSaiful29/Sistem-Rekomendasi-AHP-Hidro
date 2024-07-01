<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoriCekRekomendasi;
use App\Models\HistoriPenangananCriteria;
use App\Models\HistoriPenangananAlternatif;

class HistoriCekPenangananController extends Controller
{
    public function index(){

        $data_histori = HistoriCekRekomendasi::with('village')->get();

        // dd($data_histori);

        $data['data_histori'] = $data_histori;
        $data['tittle'] = 'Histori Cek Rekomendasi';
        return view('admin.laporan.histori-cek-rekomendasi', $data);
    }

    public function show($id){
        // dd($id);
        $data_histori = HistoriCekRekomendasi::with(['village', 'criteria', 'alternatif.alternatif'])->where('id', $id)->first();

        $data['data_histori'] = $data_histori;
        $data['tittle'] = 'Histori Cek Rekomendasi';
        return view('admin.laporan.histori-cek-rekomendasi-detail', $data);
    }
}
