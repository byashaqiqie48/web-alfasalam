<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Tahun_ajar;
use Illuminate\Support\Facades\Session;
use App\Model\Warga_belajar\Warga_belajar;
use App\Model\Admin\Status;
use Auth;

class KelolaTahunAjarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $sessions = Tahun_ajar::all();
        return view('pages.Admin.tahun_ajar', compact('sessions', 'admin_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajar' => 'required',
            'status_dibuka_tahun_ajar' => 'required',
            'status_pendaftaran' => 'required'
        ], [
            'tahun_ajar.required' => 'Tahun Ajar harus terisi !',
            'status_pendaftaran.required' => 'Status Pendaftaran harus terisi !'
        ]);

        $new = new Tahun_ajar();
        $new->fill($request->all());
        $new->admin_id = Auth::guard('admin')->user()->id;
        $new->save();
        Session::flash('berhasil', 'Tahun Ajar Berhasil Ditambahkan !');
        return redirect()->route('tahun_ajar.index');
    }

    public function detail($id)
    {
        $detail = Tahun_ajar::where('id', $id)->get()->first();
        return $detail;
    }

    public function update($id, Request $request)
    {
        Tahun_ajar::where('id', $id)->update([
            "tahun_ajar" => $request->tahun_ajar,
            "status_dibuka_tahun_ajar" => $request->status_dibuka_tahun_ajar,
            "status_pendaftaran" => $request->status_pendaftaran
            
        ]);
        Session::flash('berhasil', 'Tahun Ajar Berhasil Diedit !');
        return redirect(route('tahun_ajar.index'));
    }

    public function delete(Request $request)
    {
        Tahun_ajar::where('id', $request->id)->delete();
    }
}
