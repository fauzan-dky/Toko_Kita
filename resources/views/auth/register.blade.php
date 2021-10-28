@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="{{asset ('/css/style.css')}}">
</head>
    <body>
        <h1><i class="fas fa-store fa-3"></i> Toko Kita</h1> 
        <h3>Selamat Datang Di Toko Kita!</h3>
        <div class="card-login">
            <h1 id="login"><i class="fas fa-user-plus"></i> Register</h1>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf       
                    <label for="name">Name</label>   
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    <!-- Level Auto Set to User when crate a new account -->
                    <label for="level"></label>
                    <input class="form-control" type="text" name="level" id="level" value="User" hidden="">
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                        <br><br>
                        Have an account? <a href="{{ route('login') }}">{{ __('Login') }}</a>

                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
