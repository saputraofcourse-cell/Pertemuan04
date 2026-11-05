@php $tpl = asset('template/startbootstrap-sb-admin-2-gh-pages'); @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIAKAD - Register</title>

    <link href="{{ $tpl }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ $tpl }}/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register User</h1>
                </div>

                <form class="user" action="/register" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="form-control form-control-user @error('name') is-invalid @enderror"
                               placeholder="Full Name">
                        @error('name')<small class="text-danger pl-3">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="form-control form-control-user @error('email') is-invalid @enderror"
                               placeholder="Email">
                        @error('email')<small class="text-danger pl-3">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"
                               class="form-control form-control-user @error('password') is-invalid @enderror"
                               placeholder="Password">
                        @error('password')<small class="text-danger pl-3">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation"
                               class="form-control form-control-user" placeholder="Retype Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                </form>

                <hr>
                <div class="text-center">
                    <a class="small" href="/">Login User</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>