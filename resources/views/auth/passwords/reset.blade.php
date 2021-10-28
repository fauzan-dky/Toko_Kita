@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="{{asset ('/css/style.css')}}">
</head>
    <body>
        <h1><i class="fas fa-store fa-3"></i> Toko Kita</h1> 
        <h3>Selamat Datang Di Toko Kita!</h3>
            <div class="card-login">
            <h1 id="login"><i class="fas fa-user"></i> Login</h1>
                <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                    </button>
                </form>
                </div>
            </div>
    </body>
@endsection
