<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
      /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function index(){
        if (Auth::guard('admin')->check()) {
            return redirect()->route('adm1n.dashboard.index');
        }
        return view('pages.admin.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->route('adm1n.dashboard.index');
        }
        return redirect()->back()->with('status','Email or Password is wrong!');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return view('pages.admin.login');
    }
}
