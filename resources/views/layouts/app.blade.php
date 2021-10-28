<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Toko Kita</title>
        <!--Created By Fauzan Dicky Ghazika-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
       <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--Sweet Alert Script-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark bg-secondary shadow-sm">
                <div class="container" id="main">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="fas fa-home fa-lg"></i> Home
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        
                                        <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <script>
          function updateClock(){
            var now = new Date();
            var dname = now.getDay(),
                bln = now.getMonth(),
                tanggal = now.getDate(),
                th = now.getFullYear();
                

            Number.prototype.pad = function(digits){
              for(var n = this.toString(); n.length < digits; n = 0 + n);
              return n;
            }
            //For Date
            var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            var ids = ["hari", "tanggal", "bulan", "tahun"];
            var values = [hari[dname], tanggal.pad(2), bulan[bln], th];
            for(var i = 0; i < ids.length; i++)
            document.getElementById(ids[i]).firstChild.nodeValue = values[i];

            //For Time
            var hours = document.getElementById('Jam');
            var minutes = document.getElementById('Menit');
            var seconds = document.getElementById('Detik');

            var j = new Date().getHours();
            var m = new Date().getMinutes();
            var d = new Date().getSeconds();

            j = (j < 10) ? "0" + j : j
            m = (m < 10) ? "0" + m : m
            d = (d < 10) ? "0" + d : d

            hours.innerHTML = j;
            minutes.innerHTML = m;
            seconds.innerHTML = d;
          }

          function initClock(){
            updateClock();
            window.setInterval("updateClock()", 1);
          }
          var interval = setInterval(updateClock, 1000);
          </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
    <footer id="main" class="footer py-3 bg-secondary text-center" style="margin-bottom: 0px;">
            <div class="container">
                <span class=" text-white">
                    <i class="far fa-copyright fa-lg"></i>opyright@2021 |   Fauzan Dicky Ghazika    |   <i class="fa fa-phone fa-md"> +62 85 781 063 419</i>    |   <i class="fab fa-instagram fa-md"> @fauzan_dky</i>  |   <i class="fab fa-facebook-square fa-md"> Fauzan Dicky</i>
                </span>
            </div>
            <br>
            <div class="datetime text-white">
              <div class="date">
                <span id="hari">Hari</span>,
                <span id="tanggal">00</span> -
                <span id="bulan">Bulan</span> -
                <span id="tahun">Year</span>
              </div>
              <div class="time">
                <span id="Jam">00</span> :
                <span id="Menit">00</span> :
                <span id="Detik">00</span>
              </div>
            </div>
    </footer>

</html>
    
