<li class="nav-main-item">
    <a class="nav-main-link{{ request()->is('adm1n/dashboard') ? ' active' : '' }}" href="{{route('adm1n.dashboard.index')}}">
        <i class="nav-main-link-icon si si-cursor"></i>
        <span class="nav-main-link-name">Dashboard</span>
    </a>
</li>
<li class="nav-main-heading">Kelola Peserta</li>
<li class="nav-main-item open">
    <a class="nav-main-link" href="{{route('tahun_ajar.index')}}">
        <i class="nav-main-link-icon si si-clock"></i>
        <span class="nav-main-link-name">Tahun Ajaran</span>
    </a>
    <a class="nav-main-link " href="">
        <i class="nav-main-link-icon si si-list"></i>
        <span class="nav-main-link-name">Modul</span>
    </a>
</li>
<li class="nav-main-heading">Warga Belajar</li>
<li class="nav-main-item open">
    <a class="nav-main-link" href="{{route('list_warga_belajar.index')}}">
        <i class="nav-main-link-icon fa fa-user-friends"></i>
        <span class="nav-main-link-name">List Warga Belajar</span>
    </a>
</li>