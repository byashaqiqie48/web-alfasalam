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
            <h1 class="flex-sm-fill h1 my-2 font-w700 text-modern-darker">TAHUN AJAR</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Alfasalam Admin Backend</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="{{route('adm1n.dashboard.index')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        Tahun Ajar
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Button Add Tahun Ajar -->
<div class="block">
    <div class="block-header">
        <h3 class="block-title">List Tahun Ajaran Alfasalam</h3>
        <button type="button" class="btn btn-sm btn-primary push ml-5" data-toggle="modal" data-target="#modal-tambah">
            <i class="fa fa-fw fa-plus mr-1">
            </i>
            Add Tahun Ajar
        </button>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination js-table-sections">
            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;">No.</th>
                    <th class="d-sm-table-cell" style="width: 20%">Tahun Ajaran</th>
                    <th class="d-sm-table-cell" style="width: 15%">Jumlah Peserta</th>
                    <th class="d-sm-table-cell">Status Tahun Ajar</th>
                    <th class="d-sm-table-cell">Status Pendaftaran</th>
                    <th class="d-sm-table-cell" style="width: 15%">Created At</th>
                    <th class="d-sm-table-cell" style="width: 13%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($sessions as $session)
                <tr id="baris{{$session->id}}">
                    <td>{{$i++}}</td>
                    <td>{{$session->tahun_ajar}}</td>
                    <td>
                        {{App\Model\Admin\Status::where('tahun_ajar_id', $session->id)->count()}}
                    </td>
                    <td>
                        @if ($session->status_dibuka_tahun_ajar == 'dibuka')
                        <span class="label label-success"> {{$session->status_dibuka_tahun_ajar}}</span>
                        @else
                        <span class="label label-danger"> {{$session->status_dibuka_tahun_ajar}}</span>
                        @endif
                    </td>
                    <td>
                        @if ($session->status_pendaftaran == 'dibuka')
                        <span class="label label-success"> {{$session->status_pendaftaran}}</span>
                        @else
                        <span class="label label-danger"> {{$session->status_pendaftaran}}</span>
                        @endif
                    </td>
                    <td>{{$session->created_at->format('d - M - Y')}}</td>
                    <td>
                        <div class="row justify-content-center">
                            <a type="button" href="/adm1n/tahun_ajar/detail/{{$session->id}}" class="btn btn-sm btn-rounded btn-info mr-1">
                                <i class="fa fa-fw fa-list text-light"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-rounded btn-success ml-1 mr-1" data-toggle="modal" data-target="#modal-edit" data-id="{{$session->id}}" data-nama="{{$session->tahun_ajar}}">
                                <i class="fa fa-fw fa-pencil-alt"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-rounded btn-danger ml-1 btn-hapus" data-id="{{$session->id}}">
                                <i class="fa fa-fw fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Tambah Tahun Ajaran Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    {{-- form input --}}
                    <form id="form-tambah" action="{{route('tahun_ajar.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="number" name="admin_id" value="{{$admin_id}}" hidden>
                            <label for="tahun_ajar" class="control-label">Tahun Ajaran</label>
                            <input type="text" placeholder="Input Tahun Ajaran" class="form-control" name="tahun_ajar">
                            <label for="status_dibuka_tahun_ajar" class="control-label">Status Tahun Ajar:</label>
                            <div class="radio">
                                <label><input type="radio" name="status_dibuka_tahun_ajar" checked value="dibuka">Dibuka</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="status_dibuka_tahun_ajar" value="ditutup">Ditutup</label>
                            </div>
                            <label for="status_pendaftaran" class="control-label">Status Pendaftaran:</label>
                            <div class="radio">
                                <label><input type="radio" name="status_pendaftaran" checked value="dibuka">Dibuka</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="status_pendaftaran" value="ditutup">Ditutup</label>
                            </div>
                        </div>
                </div>
            </div>
            <div class="block-content block-content-full text-right border-top">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
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
                <div class="block-content font-size-sm">
                    {{-- form input --}}
                    <form id="form-edit" action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="number" name="admin_id" value="{{$admin_id}}" hidden>
                            <label for="tahun_ajar" class="control-label">Tahun Ajaran</label>
                            <input type="text" placeholder="Masukan Tahun Ajar" class="form-control" name="tahun_ajar" id="tahun_ajar"
                                required>
                            <label for="status_dibuka_tahun_ajar" class="control-label">Status Tahun Ajar:</label>
                            <div class="radio">
                                <label><input type="radio" name="status_dibuka_tahun_ajar" checked value="dibuka" id="status_dibuka_tahun_ajar_buka">Dibuka</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="status_dibuka_tahun_ajar" value="ditutup" id="status_dibuka_tahun_ajar_tutup">Ditutup</label>
                            </div>
                            <label for="session" class="control-label">Status Pendaftaran:</label>
                            <div class="radio">
                                <label><input type="radio" name="status_pendaftaran" checked value="dibuka">Dibuka</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="status_pendaftaran" value="ditutup">Ditutup</label>
                            </div>
                        </div>
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Edit -->
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
    var route = {
        delete: '{{route('tahun_ajar.delete')}}'
    }
    $('#form-tambah').on('submit', function() {
        One.loader('show')
    })
    $('#form-edit').on('submit', function() {
        One.loader('show')
    })

    $("#modal-edit").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        $("#form-edit").attr("action", '/adm1n/dashboard/tahun_ajar/' + button.data('id') + '/update');
        
    });

    $(document).on('click', '.btn-hapus', function() {
        data = $(this).data('id')
        Swal.fire({
            title: 'Yakin ingin menghapus Tahun Ajar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                One.loader('show')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: route.delete,
                    data: {
                        'id': $(this).data('id')
                    },
                    success: function() {
                        afterHapus(data)
                    }
                });
            }
        })
    })

    function afterHapus(i) {
        $('#baris' + i).remove()
        One.loader('hide')
        Swal.fire('Terhapus!', 'Tahun Ajar telah terhapus.', 'success')
    }
</script>

@if(Session::get('berhasil'))
<script>
    Swal.fire(
        '{{Session::get('berhasil')}}', '', 'success'
    )
</script>
@endif
@endsection