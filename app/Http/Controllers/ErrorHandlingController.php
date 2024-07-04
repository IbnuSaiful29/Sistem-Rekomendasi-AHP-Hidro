<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorHandlingController extends Controller
{
    public function error_400(){
        $data['tittle'] = 'error 400';
        return view('admin.error-handler.400', $data);
    }
    public function error_401(){
        $data['tittle'] = 'error 401';
        return view('admin.error-handler.401', $data);
    }
    public function error_403(){
        $data['tittle'] = 'error 403';
        return view('admin.error-handler.403', $data);
    }
    public function error_404(){
        $data['tittle'] = 'error 404';
        return view('admin.error-handler.404', $data);
    }
    public function error_500(){
        $data['tittle'] = 'error 500';
        return view('admin.error-handler.500', $data);
    }
    public function error_503(){
        $data['tittle'] = 'error 503';
        return view('admin.error-handler.503', $data);
    }
}
