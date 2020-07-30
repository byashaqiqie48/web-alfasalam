@extends('layouts.backend')

@section('css_before')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{asset('js/plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('js/plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection
@section('content')
<div id="page-loader" class="show"></div>
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h1 my-2">LIST WARGA BELAJAR</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Alfasalam Admin Backend</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{route('adm1n.dashboard.index')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        List Warga Belajar
                    </li>
                </ol>
            </nav>
        </div>
        @include('layouts.message')
    </div>
</div>
<div class="block">
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination js-table-sections ">
            <thead>
                <tr>
                    <th class="d-sm-table-cell text-center bg-primary" style="width: auto">
                        <p class="h6 font-w700 text-white"><i class="fa fa-male" class="block-title"></i> Male : {{$gender[1]}}</p>
                    </th>
                    <th class="d-sm-table-cell text-center bg-warning" style="width: auto">
                        <p class="h6 font-w700 text-white"><i class="fa fa-female"></i> Female : {{$gender[0]}}</p>
                    </th>
                    <th class="d-sm-table-cell text-center bg-success" style="width: auto">
                        <p class="h6 font-w700 text-white"><i class="fa fa-list"></i> Jumlah Peserta : {{ $total}}</p>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination js-table-sections ">
            <thead>
                <tr>
                    <th class="d-sm-table-cell text-center" style="width: 60px">No.</th>
                    <th class="d-sm-table-cell text-center">Nama</th>
                    <th class="d-sm-table-cell text-center">Paket</th>
                    <th class="d-sm-table-cell text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($warga_belajars as $warga_belajar)
                <tr>
                    <td class="text-center">{{$i++}}</td>
                    <td class="text-center">{{$warga_belajar->nama_lengkap}}</td>
                    <td class="text-center">{{$warga_belajar->paket}}</td>
                    <td>
                        <div class="row justify-content-center">
                            <a type="button" href="{{route('list_warga_belajar.detail',['id'=>$warga_belajar->id])}}" class="btn btn-sm  btn-info mr-1">
                                <i class="fa fa-fw fa-book-open text-light"></i>
                                <br>Detail
                            </a>
                            @if($warga_belajar->lampiran_ktp != NULL)
                            <a class="btn btn-sm  btn-success ml-1 mr-1" href="{{asset('').$warga_belajar->lampiran_ktp}}"><i class="fa fa-fw fa-file-download"></i>
                                <br>Download Lampiran</a>
                            @else
                            <a class="btn btn-sm  btn-success ml-1 mr-1" style="cursor: not-allowed;" href="#"><i class="fa fa-fw fa-file-download"></i>
                                <br>Download Lampiran</a>
                            @endif
                            <a class="btn btn-sm  btn-danger ml-1 mr-1  text-light" onclick="hapus('{{$warga_belajar->id}}','{{$warga_belajar->nama_lengkap}}')" id="hapus_peserta"><i class="fa fa-fw fa-trash  text-light"></i>
                                <br>Hapus</a>
                        </div>
                    </td>
                    @endforeach
                    
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- modal Delete -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <p class="text-light">
                        Are you sure to delete <label id="nama_lengkap"></label> as Warga Belajar?
                    </p>
                    <form action="{{route('list_warga_belajar.delete')}}" method="post">
                        @csrf
                        @method('delete')
                        <input hidden id="id_to_delete" name="id">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-danger" value="submit">
                            Continue Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js_after')
<!-- Page JS Plugins -->
<script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('js/pages/be_tables_datatables.min.js')}}"></script>
<script>
    function hapus(id, nama_peserta) {
        $('#id_to_delete').val(id);
        $('#nama_peserta').text(nama_peserta);
        $('#modal-delete').modal('show');
    }
</script>

@endsection