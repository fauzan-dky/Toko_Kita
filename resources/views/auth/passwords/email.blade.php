@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="{{asset ('/css/style.css')}}">
</head>
    <body>
        <h1><i class="fas fa-store fa-3"></i> Toko Kita</h1> 
        <h3>Selamat Datang Di Toko Kita!</h3>
            <div class="card-login">
            <h1 id="login"><i class="fas fa-key"></i>Reset Password</h1>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </form>
                </div>

            </div>
    </body>
@endsection
