<?php

namespace App\Http\Controllers\Warga_belajar\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index(){
        return view("pages.Warga_belajar.auth.forgot");
    }

    public function forgot(Request $request){
        dd($request->all());
    }

}
