@php
    $level = (int) (auth()->user()->level ?? 0);

    // [nama menu, url, ikon, level yang boleh melihat, pola url untuk "active"]
    $menu = [
        ['Home',              '/home',      'fa-home',          [1, 2, 3, 4], 'home'],
        ['Kelola Data Dosen', '/dosen',     'fa-user-tie',      [1],          'dosen*'],
        ['Kelola Akun',       '/dosen',     'fa-user-tie',      [4],          'dosen*'],
        ['Mahasiswa',         '/mahasiswa', 'fa-user-graduate', [1, 3],       'mahasiswa*'],
        ['User',              '/user',      'fa-users',         [1, 2],       'user*'],
        ['About',             '/about',     'fa-info-circle',   [1],          'about'],
        ['Chart',             '/chart',     'fa-chart-area',    [1],          'chart'],
        ['Invoice',           '/invoice',   'fa-file-invoice',  [1],          'invoice'],
    ];
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
        <div class="sidebar-brand-text mx-3">SIAKAD</div>
    </a>

    <hr class="sidebar-divider my-0">

    @foreach ($menu as [$nama, $url, $ikon, $akses, $pola])
        @if (in_array($level, $akses))
        <li class="nav-item {{ request()->is($pola) ? 'active' : '' }}">
            <a class="nav-link" href="{{ $url }}">
                <i class="fas fa-fw {{ $ikon }}"></i><span>{{ $nama }}</span>
            </a>
        </li>
        @endif
    @endforeach

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i><span>Logout</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>