<?php

namespace App\Http\Controllers\Warga_belajar\Auth;


use App\User;
use App\Model\Warga_belajar\Warga_belajar;
use App\Model\Admin\Tahun_ajar;
use App\Model\Admin\Status;
use Session;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PendaftaranController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');   
     }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $sesi = Tahun_ajar::where('status_dibuka_tahun_ajar', 'dibuka')->get();

        $peserta = Warga_belajar::all();
        $sudahDaftarSesiSekarang = null;

        if (count($sesi) == 1) {
            $alreadyuser = Warga_belajar::where($peserta->user_id, $peserta->nama_lengkap)->get();

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

    // public function showRegistrationForm()
    // {

    //     $warga_belajar = Warga_belajar::all();

    //     return view('auth.register', compact('warga_belajar'));
    // }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function register(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'nama_lengkap' => 'required',
                'nama_panggilan' => 'required',
                'alamat' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'gender' => 'required|in:L,P',
                'phone' => 'required|numeric',
                'anak_ke' => 'required|numeric',
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
                'paket' => 'required|in:Paket A,Paket B,Paket C',
                'lampiran_ktp' => 'mimes:pdf,jpeg,png,jpg|max:2048',


            ],

            $messages =
                [
                    'email.required' => 'Email Tidak Boleh Kosong !',
                    'password.required' => 'Password Tidak Boleh Kosong !',
                    'nama_lengkap.required' => 'Data Tidak Boleh Kosong !',
                    'nama_panggilan.required' => 'Data Tidak Boleh Kosong !',
                    'alamat.required' => 'Data Tidak Boleh Kosong !',
                    'tempat_lahir.required' => 'Data Tidak Boleh Kosong !',
                    'tanggal_lahir.required' => 'Data Tidak Boleh Kosong !',
                    'agama.required' => 'Data Tidak Boleh Kosong !',
                    'gender.required' => 'Data Tidak Boleh Kosong !',
                    'phone.required' => 'Data Tidak Boleh Kosong !',
                    'anak_ke.required' => 'Data Tidak Boleh Kosong !',
                    'jenis_ijazah.required' => 'Data Tidak Boleh Kosong !',
                    'tahun_ijazah.required' => 'Data Tidak Boleh Kosong !',
                    'nomor_ijazah.required' => 'Data Tidak Boleh Kosong !',
                    'nama_ayah.required' => 'Data Tidak Boleh Kosong !',
                    'pekerjaan_ayah.required' => 'Data Tidak Boleh Kosong !',
                    'alamat_ayah.required' => 'Data Tidak Boleh Kosong !',
                    'nama_ibu.required' => 'Data Tidak Boleh Kosong !',
                    'pekerjaan_ibu.required' => 'Data Tidak Boleh Kosong !',
                    'alamat_ibu.required' => 'Data Tidak Boleh Kosong !',
                    'no_ktp.required' => 'Data Tidak Boleh Kosong !',
                    'paket.required' => 'Data Tidak Boleh Kosong !',
                    'lampiran_ktp.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png, gif atau pdf.',
                    'lampiran_ktp.max' => 'Ukuran file terlalu besar, maksimal file 2Mb !',


                ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }



        //Table Warga_belajar 
        $warga_belajar = new Warga_belajar();
        $warga_belajar->email = Input::get('email');
        $warga_belajar->password = Input::get(Hash::make('password'));
        $warga_belajar->nama_lengkap = Input::get('nama_lengkap');
        $warga_belajar->nama_panggilan = Input::get('nama_panggilan');
        $warga_belajar->alamat = Input::get('alamat');
        $warga_belajar->tempat_lahir = Input::get('tempat_lahir');
        $warga_belajar->tanggal_lahir = Input::get('tanggal_lahir');
        $warga_belajar->agama = Input::get('agama');
        $warga_belajar->gender = Input::get('gender');
        $warga_belajar->phone = Input::get('phone');
        $warga_belajar->anak_ke = Input::get('anak_ke');
        $warga_belajar->jenis_ijazah = Input::get('jenis_ijazah');
        $warga_belajar->tahun_ijazah = Input::get('tahun_ijazah');
        $warga_belajar->nomor_ijazah = Input::get('nomor_ijazah');
        $warga_belajar->nama_ayah = Input::get('nama_ayah');
        $warga_belajar->pekerjaan_ayah = Input::get('pekerjaan_ayah');
        $warga_belajar->alamat_ayah = Input::get('alamat_ayah');
        $warga_belajar->nama_ibu = Input::get('nama_ibu');
        $warga_belajar->pekerjaan_ibu = Input::get('pekerjaan_ibu');
        $warga_belajar->alamat_ibu = Input::get('alamat_ibu');
        $warga_belajar->no_ktp = Input::get('no_ktp');
        $warga_belajar->paket = Input::get('paket');
        if ($file = $request->hasFile('url_foto')) {
            $namaFile = $warga_belajar->id;
            $file = $request->file('url_foto');
            $fileName = $namaFile . '_' . $file->getClientOriginalName();
            $destinationPath = public_path() . '/media/alfasalam';
            $file->move($destinationPath, $fileName);
            $warga_belajar->url_foto = $fileName;
        }
        $warga_belajar->save();


        //Table Tahun_ajaran
        $id = $warga_belajar->id;
        $sesi = Tahun_ajar::where('status_dibuka_tahun_ajar', 'dibuka')->first();
        $tahun_ajar = new Tahun_ajar();
        $tahun_ajar->tahun_ajar_id = $sesi->id;
        $tahun_ajar->save();

        //Table Status
        $id = $warga_belajar->id;
        $status = new Status();
        $status->warga_belajar_id = $id;
        $status->tahun_ajar_id = $sesi->id;
        $status->save();


        return redirect()->back()->with('success', 'Registrasi Anda telah berhasil!. Silakan login dengan menggunakan email dan password Anda.');
    }
}
