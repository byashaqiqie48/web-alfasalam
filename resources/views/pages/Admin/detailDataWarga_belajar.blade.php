@extends('layouts.backend')

@section('css_before')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="assets/css/oneui.min.css">
<link rel="stylesheet" href="assets/js/plugins/flatpickr/flatpickr.min.css">
<link rel="stylesheet" href="{{asset('js/plugins/sweetalert2/sweetalert2.min.css')}}">

@endsection


@section('content')
<div class="block">
    <div class="block-content block-content-full">
        <div class="col-md-16">
            <form id="form-update-detail" method="POST">
                @csrf
                <div class="block">
                    <div class="block-header block-header-default block-header-rtl">
                        <h3 class="block-title">Warga Belajar: {{$warga_belajar->nama_lengkap}}</h3>
                        <div class="block-options">
                            <a type="button" class="btn btn-sm btn-secondary" href="/adm1n/dashboard/list_warga_belajar">
                                Kembali ke List Warga Belajar
                            </a>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-update-detail" data-id="{{$warga_belajar->id}}" data-nama="{{$warga_belajar->nama_lengkap}}">
                                Update
                            </button>
                        </div>
                    </div>
                    <span class="font-w700 d-sm-table-cell text-center bg-warning">Apabila Tidak Ingin Mengganti Data Klik Tombol Kembali ke List Warga Belajar</span>
                    <div class="block-content">
                        <div class="row justify-content-center py-sm-3 py-md-5">
                            <div class="col-sm-10 col-md-8">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$warga_belajar->email}}" disabled>
                                    <div class="alert-danger">{{$errors->first('email')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label><br>
                                    <span>Apabila Tidak Ingin Ganti Password Abaikan</span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password Dapat Dirubah, Masukan Password Baru Dalam Kolom Ini !">
                                    <div class="alert-danger">{{$errors->first('password')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$warga_belajar->nama_lengkap}}">
                                    <div class="alert-danger">{{$errors->first('nama_lengkap')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_panggilan">Nama Panggilan</label>
                                    <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" value="{{$warga_belajar->nama_panggilan}}">
                                    <div class="alert-danger">{{$errors->first('nama_panggilan')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" rows="4" value="{{$warga_belajar->alamat}}"></input>
                                    <div class="alert-danger">{{$errors->first('alamat')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="tampat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$warga_belajar->tempat_lahir}}">
                                    <div class="alert-danger">{{$errors->first('tempat_lahir')}} </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-xl-7">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="js-flatpickr form-control bg-white js-flatpickr-enabled flatpickr-input active" id="tanggal_lahir" name="tanggal_lahir" value="{{$warga_belajar->tanggal_lahir}}" data-date-format="d-m-Y">
                                        <div class="alert-danger">{{$errors->first('tanggal_lahir')}} </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" id="agama" name="agama" value="{{$warga_belajar->agama}}">
                                    <div class="alert-danger">{{$errors->first('agama')}} </div>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    @if($warga_belajar->gender == "L")
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="L" checked disabled>
                                        <label class="form-check-label" for="example-radios-default1">Laki Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="P" disabled>
                                        <label class="form-check-label" for="example-radios-default2">Perempuan</label>
                                    </div>
                                    @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="L" checked disabled>
                                        <label class="form-check-label" for="example-radios-default1">Laki Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="P" checked disabled>
                                        <label class="form-check-label" for="example-radios-default2">Perempuan</label>
                                    </div>
                                    @endif
                                    <div class="alert-danger">{{$errors->first('gender')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$warga_belajar->phone}}">
                                    <div class="alert-danger">{{$errors->first('phone')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="anak_ke">Anak Ke-</label>
                                    <input type="text" class="form-control" id="anak_ke" name="anak_ke" value="{{$warga_belajar->anak_ke}}">
                                    <div class="alert-danger">{{$errors->first('anak_ke')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_ijazah">Jenis Ijazah</label>
                                    <input type="text" class="form-control" id="jenis_ijazah" name="jenis_ijazah" value="{{$warga_belajar->jenis_ijazah}}">
                                    <div class="alert-danger">{{$errors->first('jenis_ijazah')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_ijazah">Tahun Ijazah</label>
                                    <input type="text" class="form-control" id="tahun_ijazah" name="tahun_ijazah" value="{{$warga_belajar->tahun_ijazah}}">
                                    <div class="alert-danger">{{$errors->first('tahun_ijazah')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_ijazah">Nomor Ijazah</label>
                                    <input type="text" class="form-control" id="nomor_ijazah" name="nomor_ijazah" value="{{$warga_belajar->nomor_ijazah}}">
                                    <div class="alert-danger">{{$errors->first('nomor_ijazah')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{$warga_belajar->nama_ayah}}">
                                    <div class="alert-danger">{{$errors->first('nama_ayah')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{$warga_belajar->pekerjaan_ayah}}">
                                    <div class="alert-danger">{{$errors->first('pekerjaan_ayah')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ayah">Alamat Ayah</label>
                                    <input type="text" class="form-control" id="alamat_ayah" name="alamat_ayah" value="{{$warga_belajar->alamat_ayah}}">
                                    <div class="alert-danger">{{$errors->first('alamat_ayah')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{$warga_belajar->nama_ibu}}">
                                    <div class="alert-danger">{{$errors->first('nama_ibu')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{$warga_belajar->pekerjaan_ibu}}">
                                    <div class="alert-danger">{{$errors->first('pekerjaan_ibu')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ibu">Alamat Ibu</label>
                                    <input type="text" class="form-control" id="alamat_ibu" name="alamat_ibu" value="{{$warga_belajar->alamat_ibu}}">
                                    <div class="alert-danger">{{$errors->first('alamat_ibu')}} </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_ktp">Nomor Kartu Tanda Penduduk</label>
                                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{$warga_belajar->no_ktp}}">
                                    <div class="alert-danger">{{$errors->first('no_ktp')}} </div>
                                </div>
                                <div class="form-group">
                                    <label>Paket</label>
                                    @if($warga_belajar->paket == "Paket A")
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paket" value="Paket A" checked>
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
                                    @endif
                                    @if($warga_belajar->paket == "Paket B")
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paket" value="Paket A">
                                        <label class="form-check-label" for="example-radios-default1">Paket A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paket" value="Paket B" checked>
                                        <label class="form-check-label" for="example-radios-default2">Paket B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paket" value="Paket C">
                                        <label class="form-check-label" for="example-radios-default2">Paket C</label>
                                    </div>
                                    @endif
                                    @if($warga_belajar->paket == "Paket C")
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paket" value="Paket A">
                                        <label class="form-check-label" for="example-radios-default1">Paket A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paket" value="Paket B">
                                        <label class="form-check-label" for="example-radios-default2">Paket B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paket" value="Paket C" checked>
                                        <label class="form-check-label" for="example-radios-default2">Paket C</label>
                                    </div>
                                    @endif
                                    <div class="alert-danger">{{$errors->first('paket')}} </div>
                                    <div class="form-group">
                                        <label class="d-block" for="lampiran_ktp">File Input Lampiran KTP</label>
                                        <input type="file" id="lampiran_ktp" name="lampiran_ktp">
                                        <div class="alert-danger">{{$errors->first('lampiran_ktp')}} </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update-detail" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Edit Tahun Ajar</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-update-detail" action="" method="POST">
                    @csrf
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_after')
<script src="assets/js/oneui.core.min.js"></script>
<script src="assets/js/oneui.app.min.js"></script>
<script src="{{asset('js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
    $('#form-update-detail').on('submit', function() {
        One.loader('show')
    })
    $("#modal-update-detail").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        $("#form-update-detail").attr("action", '/adm1n/dashboard/list_warga_belajar/detai/' + button.data('id') + '/update');

    });
</script>
@if(Session::get('berhasil'))
<script>
    Swal.fire(
        '{{Session::get('
        berhasil ')}}', '', 'success'
    )
</script>
@endif
@endsection