<?php

namespace App\Http\Controllers\Warga_belajar\Auth;


use App\User;
use App\Model\Warga_belajar\Warga_belajar;
use App\Model\Admin\Tahun_ajar;
use App\Model\Admin\Status;
use Session;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PendaftaranController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {

        $sesi = Tahun_ajar::where('status_dibuka_tahun_ajar', 'dibuka')->get();

        $peserta = Warga_belajar::all();
        $sudahDaftarSesiSekarang = null;

        if (count($sesi) == 1) {
            $alreadyuser = Warga_belajar::where('id', 'nama_lengkap')->get();

            if ($alreadyuser) {
                $i = 0;
                foreach ($alreadyuser as $ulang) {
                    $sudahDaftarSesiSekarang = Status::where('tahun_ajar_id', $sesi[0]->id)->where('warga_belajar_id', $ulang->id)->first();
                    if ($sudahDaftarSesiSekarang != null || count($alreadyuser) == 1) {
                        break;
                    }
                    $i++;
                }
                if ($sudahDaftarSesiSekarang) {
                    $alreadyuser = $alreadyuser[$i];
                    return view('pages.Warga_belajar.auth.pendaftaran', compact('alreadyuser'))->with('warning', 'Oops: Anda sudah mengisi data registrasi, jika memerlukan update silahkan menuju dashboard Kelola Data !')->with('status', 'open');
                }
            }
            return view('pages.Warga_belajar.auth.pendaftaran', compact('peserta'))->with('status', 'open');
        } //kalau lebih dari 1 sesi yang dibuka ya tidak boleh
        else if (count($sesi) > 1) {
            return view('pages.Warga_belajar.auth.pendaftaran',  compact('peserta'))->with('status', 'adminError');
        } else {
            return view('pages.Warga_belajar.auth.pendaftaran',  compact('peserta'))->with('status', 'closed');
        }

        //  $skills = Skill::all();
        //  $peserta = Session::get('users');
        //  $alreadyuser = Peserta::where('nim',$peserta->user_name)->first();
        //  $user = Peserta::where('nim',$peserta->user_name)->first();

        //  if($alreadyuser){
        //     return view('frontend.kelola-data',compact('user','skills','alreadyuser'))->with('warning', 'Oops: Anda sudah mengisi data registrasi, jika memerlukan update silahkan menuju dashboard Kelola Data !')->with('status','open');
        // }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required',
            'password' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'anak_ke' => 'required',
            'jenis_ijazah' => 'required',
            'tahun_ijazah' => 'required',
            'nomor_ijazah' => 'required',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'alamat_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',
            'no_ktp' => 'required',
            'paket' => 'required',
            'lampiran_ktp' => 'required|mimes:pdf|max:1024',
        ]);
    }

   


    protected function create(Request $request)
    {
        $sesi = Tahun_ajar::where('status_dibuka_tahun_ajar', 'dibuka')->first();
        $lampiran_ktp = $request->file('lampiran_ktp');
        $name_lampiran = $sesi->tahun_ajar . "-" . $request->input('nama_lengkap') . "-lampiran." . $lampiran_ktp->getClientOriginalExtension();
        $path_lampiran = "files/lampiran/" . $name_lampiran;
        $lampiran_ktp->move((public_path() . "/files/lampiran/"), $name_lampiran);
        $warga_belajar = new Warga_belajar();
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
        $warga_belajar->lampiran_ktp = $path_lampiran;
        $warga_belajar->save();


        //Table Status
        $id = $warga_belajar->id;
        $status = new Status();
        $status->warga_belajar_id = $id;
        $status->tahun_ajar_id = $sesi->id;
        $status->save();



        
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $this->create($request);
        Session::flash('berhasil', 'Registrasi Anda telah berhasil!. Silakan login dengan menggunakan email dan password Anda !');
        return redirect()->route('warga_belajar.daftar');
    }
}
