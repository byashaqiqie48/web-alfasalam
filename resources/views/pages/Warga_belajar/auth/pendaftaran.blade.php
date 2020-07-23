 @extends('layouts.wargabelajar-pendaftaran')

 @section('css_before')
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- Page JS Plugins CSS -->
 <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
 <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
 <link rel="stylesheet" href="assets/css/oneui.min.css">
 <link rel="stylesheet" href="assets/js/plugins/flatpickr/flatpickr.min.css">
 <link rel="stylesheet" href="{{asset('js/plugins/sweetalert2/sweetalert2.min.css')}}">

 @endsection

 @section('content')
 @if($status == 'adminError')
 <div class="bg-body-light">
     eror
 </div>
 @elseif($status == 'closed')
 <div class="bg-body-light">
     closed
 </div>
 @else
 <!-- Hero -->
 <div class="bg-body-light">
     <div class="content content-full">
         <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
             <h1 class="flex-sm-fill h1 my-2">
                 Pendaftaran Warga Belajar Alfasalam
             </h1>
             <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                 <ol class="breadcrumb breadcrumb-alt">
                     <a class="breadcrumb-item" href="{{route('halaman.utama')}}">Alfasalam</a>
                     <li class="breadcrumb-item" aria-current="page">
                         <a class="link-fx" href="">Daftar</a>
                     </li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>
 <!-- END Hero -->
 <!-- Page Content -->
 <div class="content content-full">
     <!-- Basic -->
     <div class="block">
         <div class="block-header bg-body-dark">
             <h2>Form Pendaftaran</h2>
             <p>
                 Isi Form Berikut untuk Pendaftaran Warga Belajar
             </p>
         </div>
         <div class="block-content block-content-full">
             <form id="form-daftar" action="{{route('warga_belajar.daftar.submit')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="row push">
                     <div class="col-lg-8">
                         <div class="col-lg-8 col-xl-12">
                             <div class="form-group">
                                 <label for="email">Email</label>
                                 <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Alamat Email">
                                 <div class="alert-danger">{{$errors->first('email')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="password">Password</label>
                                 <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                                 <div class="alert-danger">{{$errors->first('password')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="nama_lengkap">Nama Lengkap</label>
                                 <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap Anda">
                                 <div class="alert-danger">{{$errors->first('nama_lengkap')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="nama_panggilan">Nama Panggilan</label>
                                 <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" placeholder="Masukan Nama Panggilan Anda">
                                 <div class="alert-danger">{{$errors->first('nama_panggilan')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="alamat">Alamat</label>
                                 <textarea class="form-control" id="alamat" name="alamat" rows="4" placeholder="Masukan Alamat Anda"></textarea>
                                 <div class="alert-danger">{{$errors->first('alamat')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="tampat_lahir">Tempat Lahir</label>
                                 <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan Tempat Lahir Anda">
                                 <div class="alert-danger">{{$errors->first('tempat_lahir')}} </div>
                             </div>
                             <div class="form-row">
                                 <div class="form-group col-xl-7">
                                     <label for="tanggal_lahir">Tanggal Lahir</label>
                                     <input type="date" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal - Bulan - Tahun" data-date-format="d-m-Y">
                                     <div class="alert-danger">{{$errors->first('tanggal_lahir')}} </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="agama">Agama</label>
                                 <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukan Agama Anda">
                                 <div class="alert-danger">{{$errors->first('agama')}} </div>
                             </div>
                             <div class="form-group">
                                 <label>Gender</label>
                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" name="gender" value="L">
                                     <label class="form-check-label" for="example-radios-default1">Laki Laki</label>
                                 </div>
                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" name="gender" value="P">
                                     <label class="form-check-label" for="example-radios-default2">Perempuan</label>
                                 </div>
                                 <div class="alert-danger">{{$errors->first('gender')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="phone">Phone</label>
                                 <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukan Nomor Telepon Anda">
                                 <div class="alert-danger">{{$errors->first('phone')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="anak_ke">Anak Ke-</label>
                                 <input type="text" class="form-control" id="anak_ke" name="anak_ke" placeholder="Anda Adalah Anak Ke.....">
                                 <div class="alert-danger">{{$errors->first('anak_ke')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="jenis_ijazah">Jenis Ijazah</label>
                                 <input type="text" class="form-control" id="jenis_ijazah" name="jenis_ijazah" placeholder="Masukan Jenis Ijazah Anda">
                                 <div class="alert-danger">{{$errors->first('jenis_ijazah')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="tahun_ijazah">Tahun Ijazah</label>
                                 <input type="text" class="form-control" id="tahun_ijazah" name="tahun_ijazah" placeholder="Masukan Tahun Ijazah Anda">
                                 <div class="alert-danger">{{$errors->first('tahun_ijazah')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="nomor_ijazah">Nomor Ijazah</label>
                                 <input type="text" class="form-control" id="nomor_ijazah" name="nomor_ijazah" placeholder="Masukan Nomor Ijazah Anda">
                                 <div class="alert-danger">{{$errors->first('nomor_ijazah')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="nama_ayah">Nama Ayah</label>
                                 <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukan Nama Ayah Anda">
                                 <div class="alert-danger">{{$errors->first('nama_ayah')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                 <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukan Pekerjaan Ayah Anda">
                                 <div class="alert-danger">{{$errors->first('pekerjaan_ayah')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="alamat_ayah">Alamat Ayah</label>
                                 <input type="text" class="form-control" id="alamat_ayah" name="alamat_ayah" placeholder="Masukan Alamat Ayah Anda">
                                 <div class="alert-danger">{{$errors->first('alamat_ayah')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="nama_ibu">Nama Ibu</label>
                                 <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukan Nama Ibu Anda">
                                 <div class="alert-danger">{{$errors->first('nama_ibu')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                 <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukan Pekerjaan Ibu Anda">
                                 <div class="alert-danger">{{$errors->first('pekerjaan_ibu')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="alamat_ibu">Alamat Ibu</label>
                                 <input type="text" class="form-control" id="alamat_ibu" name="alamat_ibu" placeholder="Masukan Alamat Ibu Anda">
                                 <div class="alert-danger">{{$errors->first('alamat_ibu')}} </div>
                             </div>
                             <div class="form-group">
                                 <label for="no_ktp">Nomor Kartu Tanda Penduduk</label>
                                 <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukan Nomor KTP">
                                 <div class="alert-danger">{{$errors->first('no_ktp')}} </div>
                             </div>
                             <div class="form-group">
                                 <label>Paket</label>
                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" name="paket" value="Paket A">
                                     <label class="form-check-label" for="example-radios-default1">Paket A</label>
                                 </div>
                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" name="paket" value="Paket B">
                                     <label class="form-check-label" for="example-radios-default2">Paket B</label>
                                 </div>
                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" name="paket" value="Paket C">
                                     <label class="form-check-label" for="example-radios-default2">Paket C</label>
                                 </div>
                                 <div class="alert-danger">{{$errors->first('paket')}} </div>
                             </div>
                             <div class="form-group">
                                 <label class="d-block" for="lampiran_ktp">File Input Lampiran KTP</label>
                                 <input type="file" id="lampiran_ktp" name="lampiran_ktp">
                                 <div class="alert-danger">{{$errors->first('lampiran_ktp')}} </div>
                             </div>
                             <div class="form-group">
                                 <button type="button" class="btn btn-lg btn-light" data-dismiss="modal">Batal</button>
                                 <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-check mr-1"></i>Daftar</button>
                             </div>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- END Basic -->
 @endif
 @endsection

 @section('js_after')
 <script src="assets/js/oneui.core.min.js"></script>
 <script src="assets/js/oneui.app.min.js"></script>
 <script src="{{asset('js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

 <script>
     $('#form-daftar').on('submit', function() {
         One.loader('show')
     })
 </script>

 @if(Session::get('berhasil'))
 <script>
     Swal.fire({
         title: 'Pendaftaran Berhasil !',
         text: "Login dengan Akun Baru Anda !",
         icon: 'success',
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'OK ! Masuk ke Halaman Login Warga Belajar'
     }).then((result) => {
         if (result.value) {
            window.location.href = "{{route('warga_belajar.login.get')}}"
         }
     })
 </script>
 @endif
 @endsection