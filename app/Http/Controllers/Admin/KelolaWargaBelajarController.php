<?php

namespace App\Http\Controllers\Admin;

use App\Model\Warga_belajar\Warga_belajar;
use App\Model\Admin\Tahun_ajar;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class KelolaWargaBelajarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $tahun_ajars = Tahun_ajar::all();
        $warga_belajars = Warga_belajar::all();
        $male = 0;
        $female = 0;
        $total = 0;
        foreach ($warga_belajars as $warga_belajar) {
            if ($warga_belajar->gender == "L") {
                $male++;
            } else {
                $female++;
            }
            $total++;
        }
        $gender = [$female, $male];

        return view('pages.Admin.list-warga_belajar', compact('warga_belajars', 'gender', 'total', 'tahun_ajars'));
    }

    public function detail(Request $request, $id)
    {
        $d = Warga_belajar::all();
        $warga_belajar = Warga_belajar::find($id);
        return view('pages.Admin.detailDataWarga_belajar', compact('warga_belajar', 'd'));
    }

    public function update(Request $request, $id)
    {
        $warga_belajar = Warga_belajar::find($id);
        $warga_belajar->email = $request->input('email');
        $warga_belajar->password = Hash::make($request->input('password'));
        $warga_belajar->nama_lengkap = $request->input('nama_lengkap');
        $warga_belajar->nama_panggilan = $request->input('nama_panggilan');
        $warga_belajar->alamat = $request->input('alamat');
        $warga_belajar->tempat_lahir = $request->input('tempat_lahir');
        $warga_belajar->tanggal_lahir = $request->input('tanggal_lahir');
        $warga_belajar->agama = $request->input('agama');
        $warga_belajar->gender = $request->input('gender');
        $warga_belajar->phone = $request->input('phone');
        $warga_belajar->anak_ke = $request->input('anak_ke');
        $warga_belajar->jenis_ijazah = $request->input('jenis_ijazah');
        $warga_belajar->tahun_ijazah = $request->input('tahun_ijazah');
        $warga_belajar->nomor_ijazah = $request->input('nomor_ijazah');
        $warga_belajar->nama_ayah = $request->input('nama_ayah');
        $warga_belajar->pekerjaan_ayah = $request->input('pekerjaan_ayah');
        $warga_belajar->alamat_ayah = $request->input('alamat_ayah');
        $warga_belajar->nama_ibu = $request->input('nama_ibu');
        $warga_belajar->pekerjaan_ibu = $request->input('pekerjaan_ibu');
        $warga_belajar->alamat_ibu = $request->input('alamat_ibu');
        $warga_belajar->no_ktp = $request->input('no_ktp');
        $warga_belajar->paket = $request->input('paket');
        if ($request->has('lampiran_ktp')) {
            $this->updateLampiran($request);
        }
        $warga_belajar->update();


        return redirect('/adm1n/dashboard/list_warga_belajar')->with('success', 'Data Warga Belajar Berhasil di edit !');
    }

    public function updateLampiran(Request $request)
    {
        $warga_belajar = Warga_belajar::where('id', $request->id)->first();
        $lampiran_ktp = $request->file('lampiran_ktp');
        $name_lampiran =  $request->input('nama_lengkap') . "-lampiran." . $lampiran_ktp->getClientOriginalExtension();
        $path_lampiran = "files/lampiran/" . $name_lampiran;
        $lampiran_ktp->move((public_path() . "/files/lampiran/"), $name_lampiran);
        $warga_belajar->lampiran_ktp = $path_lampiran;
        $warga_belajar->save();
    }

    public function getLampiran(Request $request)
    {
        $file = public_path() . '/' . $request->input('lampiran_ktp');
        $headers = array('Content-Type: application/pdf');
        return Response::download($file, 'lampiran_ktp.pdf', $headers);
    }

    public function delete(Request $request)
    {
        $destroy = Warga_belajar::findOrFail($request->id);
        try {
            if ($destroy->lampiran_ktp != NULL) {
                unlink(public_path() . "/" . $destroy->lampiran_ktp);
            }
        } catch (Exception $e) { }
        $destroy->delete();
        return redirect('/adm1n/dashboard/list_warga_belajar')->with('success', 'Warga Belajar Sudah Dihapus !');
    }
}
