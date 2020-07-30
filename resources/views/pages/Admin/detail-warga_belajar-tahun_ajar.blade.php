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
                        Tahun Ajar
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        Detail
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
                    <th class="d-sm-table-cell text-center" style="width: 60px">No.</th>
                    <th class="d-sm-table-cell text-center">Nama</th>
                    <th class="d-sm-table-cell text-center">Email</th>
                    <th class="d-sm-table-cell text-center">Alamat</th>
                    <th class="d-sm-table-cell text-center">Tanggal Daftar</th>
                    <th class="d-sm-table-cell text-center">Paket</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                
                @foreach ($status as $s )
                @if($stats == 'tahun_ajar_ini')
                <tr>
                    <td class="text-center">{{$i++}}</td>
                    <td class="text-center">{{$s->Warga_belajars->nama_lengkap}}</td>
                    <td class="text-center">{{$s->Warga_belajars->email}}</td>
                    <td class="text-center">{{$s->Warga_belajars->alamat}}</td>
                    <td class="text-center">{{$s->Warga_belajars->created_at->format('d-M-Y')}}</td>
                    <td class="text-center">{{$s->Warga_belajars->paket}}</td>
                   
                </tr>
               @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection