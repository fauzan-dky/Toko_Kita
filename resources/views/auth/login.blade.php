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
                <form method="POST" action="{{ route('login') }}">
                    @csrf                     
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


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                        Remember me?
                        </label>
                    </div>
                    <div id="action">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                        </button> 
                        <p id="or"> or login with</p>
                        <span>
                            <a href="https://www.facebook.com/login"><i id="icon" class="fab fa-facebook" style="background-color: white; color: blue; "></i></a>
                        </span>
                        <span>
                            <a href="https://www.instagram.com"><i id="icon" class="fab fa-instagram" style="background-color: white; color: #fc0388; "></i></a>
                        </span>
                        <span>
                            <a href="https://accounts.google.com/signin"><i id="icon" class="fab fa-google-plus" style="background-color: white; color: red; "></i></a>
                        </span>
                        <span>
                            <a href="https://www.twitter.com/login"><i id="icon" class="fab fa-twitter" style=" color: #0388fc; "></i></a>
                        </span>
                        <br><br>
                        Create an account? <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        <br>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot your Password?
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
