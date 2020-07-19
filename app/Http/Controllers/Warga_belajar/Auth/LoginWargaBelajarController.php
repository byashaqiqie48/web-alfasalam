<?php

namespace App\Http\Controllers\Warga_belajar\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginWargaBelajarController extends Controller
{
      /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    
    public function index(){
        if (Auth::guard('warga_belajar')->check()) {
            return redirect()->route('halaman.utama');
        }
        return view('pages.warga_belajar.auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        if (Auth::guard('warga_belajar')->attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->route('halaman.utama');
        }
        return redirect()->back()->with('status','Email or Password is wrong!');
    }

    public function logout(){
        Auth::guard('warga_belajar')->logout();
        return view('pages.warga_belajar.auth.login');
    }
}
