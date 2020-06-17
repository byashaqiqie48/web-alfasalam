<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Tahun_ajar;
use App\Model\Warga_belajar\Warga_belajar;
use Auth;

class TahunAjarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin_id = Auth::id();
        $sessions = Tahun_ajar::all();
        return view('pages.Admin.tahun_ajar', compact('sessions', 'admin_id'));
    }
}
