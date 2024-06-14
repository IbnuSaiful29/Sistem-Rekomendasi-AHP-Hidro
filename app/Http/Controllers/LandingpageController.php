<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index(){
        $data['tittle'] = 'Home';
        return view('front.home', $data);
    }
}
