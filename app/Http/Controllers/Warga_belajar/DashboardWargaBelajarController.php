<?php

namespace App\Http\Controllers\Warga_belajar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardWargaBelajarController extends Controller
{
    public function index(){
        return view('pages.Warga_belajar.halaman-utama');
    }
}
