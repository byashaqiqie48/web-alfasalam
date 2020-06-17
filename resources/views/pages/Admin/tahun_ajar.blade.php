<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
    <thead>
        <tr>
            <th>#</th>
            <th style="width: 20%">Tahun Ajaran</th>
            <th style="width: 15%">Jumlah Peserta</th>
            <th>Status</th>
            <th style="width: 15%">Created At</th>
            <th style="width: 13%">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($sessions as $session)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$session->tahun_ajar}}</td>
            <td>
                {{App\Model\Warga_belajar\Warga_belajar::where('tahun_ajar_id', $session->id)->count()}}
            </td>
            <td>
                @if ($session->status_dibuka_tahun_ajar == 'dibuka')
                <span class="label label-success"> {{$session->status_dibuka_tahun_ajar}}</span>
                @else
                <span class="label label-danger"> {{$session->status_dibuka_tahun_ajar}}</span>
                @endif


            </td>
            <td>{{$session->created_at->format('d - M - Y')}}</td>
            <td style="text-align: center">
                <a onclick="detail('{{$session->id}}')" class="btn btn-green btn-sm tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit fa-white"></i></a>
                <a href="" class="btn btn-yellow btn-sm tooltips" data-placement="top" data-original-title="Detail"><i class="fa fa-search"></i></a>
                <a onclick="hapus('{{$session->id}}')" class="btn btn-red btn-sm tooltips" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>