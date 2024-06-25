<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $data['tittle'] = 'About';
        return view('front.about', $data);
    }
}
