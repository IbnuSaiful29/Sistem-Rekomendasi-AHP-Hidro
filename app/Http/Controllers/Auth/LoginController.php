<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout(); // Logout pengguna
        Session::flush(); // Menghapus semua data sesi pengguna
        return redirect()->route('login'); // Redirect ke halaman login
    }

    public function loginAjax(Request $request){
        $credentials = $request->only('username', 'password');

        dd($credentials);
        die;

        // if (Auth::attempt($credentials)) {
        //     // Login berhasil, kirim respons JSON
        //     return response()->json(['success' => true, 'redirect' => route('dashboard')]);
        // } else {
        //     // Login gagal, kirim respons JSON dengan pesan error
        //     return response()->json(['success' => false, 'error' => 'Username atau password salah.'], 401);
        // }
    }
}
