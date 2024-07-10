<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Criteria;
use App\Models\Alternatif;
use App\Models\Village;
use App\Models\Contact;
use App\Models\HistoriCekRekomendasi;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $count_data_user = User::count();
        $count_data_alternatif = Alternatif::count();
        $count_data_village = Village::count();
        $count_data_criteria = Criteria::count();
        $count_data_contact = Contact::count();
        $count_data_histori = HistoriCekRekomendasi::count();

        $data['count_data_user'] = $count_data_user;
        $data['count_data_alternatif'] = $count_data_alternatif;
        $data['count_data_village'] = $count_data_village;
        $data['count_data_contact'] = $count_data_contact;
        $data['count_data_criteria'] = $count_data_criteria;
        $data['count_data_histori'] = $count_data_histori;
        $data['tittle'] = 'Dashboard';
        return view('admin.dashboard', $data);
    }
}
