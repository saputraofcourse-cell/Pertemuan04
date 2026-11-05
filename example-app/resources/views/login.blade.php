@php $tpl = asset('template/startbootstrap-sb-admin-2-gh-pages'); @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIAKAD - Login</title>

    <link href="{{ $tpl }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ $tpl }}/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">

                        <div class="col-lg-6 d-none d-lg-block p-0 overflow-hidden">
                            <img src="{{ asset('images/baru.avif') }}" alt="Login" class="w-100 h-100" style="object-fit: cover; object-position: center;">
                        </div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login SIAKAD</h1>
                                </div>

                                @if (session('pesan'))
                                    <div class="alert alert-success">{{ session('pesan') }}</div>
                                @endif

                                <form class="user" action="/login" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}"
                                               class="form-control form-control-user @error('email') is-invalid @enderror"
                                               placeholder="Masukkan Email">
                                        @error('email')<small class="text-danger pl-3">{{ $message }}</small>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password"
                                               class="form-control form-control-user @error('password') is-invalid @enderror"
                                               placeholder="Masukkan Password">
                                        @error('password')<small class="text-danger pl-3">{{ $message }}</small>@enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                            <label class="custom-control-label" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/register">Create an Account!</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ $tpl }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ $tpl }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>