<?php

namespace App\Http\Controllers\Warga_belajar\Pendaftaran;

use App\User;
use App\Model\Warga_belajar\Warga_belajar;
use App\Model\Admin\Tahun_ajar;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RegisterController extends Controller
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

    use RegistersUsers;

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
        $this->middleware('guest');
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $sesi = Oprec::where('status_dibuka_oprec', 'dibuka')->get();

        $peserta = Session::get('users');
        $sudahDaftarSesiSekarang = null;

        if (count($sesi) == 1) {
            $skills = Skill::all();
            $alreadyuser = Peserta::where('nim', $peserta->user_name)->get();

            if ($alreadyuser) {
                $i = 0;
                foreach ($alreadyuser as $ulang) {
                    $sudahDaftarSesiSekarang = Status::where('oprec_id', $sesi[0]->id)->where('peserta_id', $ulang->id)->first();
                    if ($sudahDaftarSesiSekarang != null || count($alreadyuser) == 1) {
                        break;
                    }
                    $i++;
                }
                if ($sudahDaftarSesiSekarang) {
                    $alreadyuser = $alreadyuser[$i];
                    return view('frontend.kelola-data', compact('skills', 'alreadyuser'))->with('warning', 'Oops: Anda sudah mengisi data registrasi, jika memerlukan update silahkan menuju dashboard Kelola Data !')->with('status', 'open');
                }
            }
            return view('frontend.register-peserta', compact('peserta'))->with('status', 'open');
        } //kalau lebih dari 1 sesi yang dibuka ya tidak boleh
        else if (count($sesi) > 1) {
            return view('frontend.register-peserta',  compact('peserta'))->with('status', 'adminError');
        } else {
            return view('frontend.register-peserta',  compact('peserta'))->with('status', 'closed');
        }

        //  $skills = Skill::all();
        //  $peserta = Session::get('users');
        //  $alreadyuser = Peserta::where('nim',$peserta->user_name)->first();
        //  $user = Peserta::where('nim',$peserta->user_name)->first();

        //  if($alreadyuser){
        //     return view('frontend.kelola-data',compact('user','skills','alreadyuser'))->with('warning', 'Oops: Anda sudah mengisi data registrasi, jika memerlukan update silahkan menuju dashboard Kelola Data !')->with('status','open');
        // }
    }
    public function showRegistrationForm()
    {

        $warga_belajar = Warga_belajar::all();

        return view('auth.register', compact('warga_belajar'));
    }


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

        //Table Users
        $user = new User();
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->level = 1;
        $user->save();


        //Table Warga_belajar 
        $user_id = $user->id;
        $warga_belajar = new Warga_belajar();
        $warga_belajar->user_id = $user_id;
        $warga_belajar->nama = Input::get('nama');
        $warga_belajar->nis = Input::get('nis');
        $warga_belajar->tempat_lahir = Input::get('tempat_lahir');
        $warga_belajar->tanggal_lahir = Input::get('tanggal_lahir');
        $warga_belajar->nem = Input::get('nem');
        $warga_belajar->no_ijazah = Input::get('no_ijazah');
        $warga_belajar->nama_ortu = Input::get('nama_ortu');
        $warga_belajar->pekerjaan_ortu = Input::get('pekerjaan_ortu');
        $warga_belajar->telp = Input::get('telp');
        $warga_belajar->alamat = Input::get('alamat');
        $warga_belajar->jenis_sekolah = Input::get('jenis_sekolah');
        if ($file = $request->hasFile('url_foto')) {
            $namaFile = $user->id;
            $file = $request->file('url_foto');
            $fileName = $namaFile . '_' . $file->getClientOriginalName();
            $destinationPath = public_path() . '/images/';
            $file->move($destinationPath, $fileName);
            $warga_belajar->url_foto = $fileName;
        }
        $warga_belajar->save();


        //Table Tahun_ajaran
        $id = $warga_belajar->id;
        $sesi = Tahun_ajar::where('status_dibuka_tahun_ajar', 'dibuka')->first();
        $tahun_ajar = new Tahun_ajar();
        $tahun_ajar->user_id = $id;
        $tahun_ajar->tahun_ajar_id = $sesi->id;
        $tahun_ajar->save();

        return redirect()->back()->with('success', 'Registrasi Anda telah berhasil!. Silakan login dengan menggunakan email dan password Anda.');
    }
}
