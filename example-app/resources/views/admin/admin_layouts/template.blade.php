@php $tpl = asset('template/startbootstrap-sb-admin-2-gh-pages'); @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIAKAD - @yield('title')</title>

    <link href="{{ $tpl }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ $tpl }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ $tpl }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @stack('styles')
</head>

<body id="page-top">
<div id="wrapper">

    {{-- Sidebar --}}
    @include('admin.admin_layouts.navbar')

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            {{-- Topbar --}}
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                {{ auth()->user()->name ?? 'Tamu' }}<br>
                                <small>Level : {{ auth()->user()->level_nama ?? '-' }}</small>
                            </span>
                            <img class="img-profile rounded-circle" src="{{ $tpl }}/img/undraw_profile.svg">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            {{-- Isi halaman --}}
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">@yield('page')</h1>
                @yield('konten')
            </div>
        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; SIAKAD Politeknik Negeri Subang {{ date('Y') }}</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

{{-- Modal Logout --}}
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">Pilih "Logout" jika ingin mengakhiri sesi Anda.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ $tpl }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ $tpl }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ $tpl }}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{ $tpl }}/js/sb-admin-2.min.js"></script>
<script src="{{ $tpl }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ $tpl }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
@stack('scripts')
</body>
</html>