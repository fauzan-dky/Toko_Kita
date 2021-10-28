<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Toko Kita</title>
        <!--Created By Fauzan Dicky Ghazika-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta charset="utf-8">
  	    <meta name="csrf-token" content="{{ csrf_token() }}">
  	    <script src="{{ asset('js/app.js') }}" defer></script>
  	    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--Sweet Alert Script-->
  	    <link rel="dns-prefetch" href="//fonts.gstatic.com">
  	    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  	    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <style>
          body {
            background-color: lightblue;
          }
          nav {
            position: fixed;
          }
          div.card {
            padding: 10px;
            margin: 10px;
          }
          h1, p {
            color: red;
          }
          p {
            text-align: left;
            margin-left: 50px;
          }
          .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
          }

          .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            display: block;
            transition: 0.3s;
          }

          .sidenav a:hover {
            background-color: lightgrey;
            color: black;
          }

          .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
          }

          #main {
            transition: margin-left .5s;
            padding: 16px;
          }

          @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
          }
          .card-product {
            background-color: rgba(245, 245, 245, 0.9);
            border: none;
            border-radius: 20px;
            transition: transform .3s;
          }
          .card-product:hover {
            transform: translateY(-20px);
            transition: transform .3s;
            outline-color: red;
            animation: mymove 2s infinite;
          }
          @keyframes mymove {
            0% {box-shadow: 20px 20px 20px red;}
            25% {box-shadow: 20px 20px 20px yellow;}
            50% {box-shadow: 20px 20px 20px green;}
            75% {box-shadow: 20px 20px 20px blue;}
            100% {box-shadow: 20px 20px 20px purple;}
          }
          .fa-star {
            color: gold;
          }
          .dark-mode {
            background-color: black;
            color: white;
          }
          .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
          }

          .switch input { 
            opacity: 0;
            width: 0;
            height: 0;
          }

          .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
          }

          .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
          }

          input:checked + .slider {
            background-color: #2196F3;
          }

          input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
          }

          input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
          }

          /* Rounded sliders */
          .slider.round {
            border-radius: 34px;
          }

          .slider.round:before {
            border-radius: 50%;
          }
        </style>
    </head>
    <body onload="initClock()">
        <div id="app">
          <div class="container" style="margin-top: 20px; ">
            <div class="container mt-4" style="width: 400px;">
              <center>
                <h1><i class="fas fa-store fa-3"></i> Toko Kita</h1> 
            </center>
            </div>
          </div> 
          <br>
          <nav class="navbar navbar-expand-md navbar-dark bg-secondary shadow-sm">
              <div id="mySidenav" class="sidenav bg-dark">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <!--Search Bar-->
                  <form class="d-flex" method="get" action="{{url('/search')}}">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="margin-left: 10px;" name="nama">
                    <button class="btn btn-success" type="submit" style="margin-right: 10px;"><i class="fas fa-search"></i></button>
                  </form>
                  @if (Auth()->user()->level=="Admin")
                  
                    <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Control Admin</a>
                    <ul class="collapse list-unstyled bg-secondary" id="adminSubmenu">
                        <li>
                            <a href="{{url('/member_list')}}"><i class="fas fa-list-ol"></i> Member List</a>
                        </li>
                        <li>
                            <a href="{{url('/add_member')}}"><i class="fas fa-plus-circle"></i> Add Member</a>
                        </li>
                        <li>
                            <a href="{{url('/add_product')}}"><i class="fas fa-plus-circle"></i> Add Product</a>
                        </li>
                        <li>
                            <a href="{{url('/transaction_report')}}"><i class="fas fa-history"></i> Transaction Report</a>
                        </li>
                    </ul>
                  
                  @endif
                  
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">List Product</a>
                    <ul class="collapse list-unstyled bg-secondary" id="homeSubmenu">
                        <li>
                            <a href="{{url('/list_food_product')}}"><i class="fas fa-utensils"></i> Food Product</a>
                        </li>
                        <li>
                            <a href="{{url('/list_electronic_product')}}"><i class="fas fa-plug"></i> Electronic Product</a>
                        </li>
                        <li>
                            <a href="{{url('/list_stationery_product')}}"><i class="fas fa-book"></i> Stationery Product</a>
                        </li>
                    </ul>
                  
                  <a href="{{url('/troli')}}">Troli
                      <?php 
                        $User = DB::table('users')
                            ->select('id')
                            ->get();
                          if(!empty($User))
                          {
                            $notif = DB::table('troli')
                            ->select('id_keranjang')
                            ->where('status', 0)
                            ->where('user_id', '=', Auth::user()->id)
                            ->count();
                          }
                      ?>
                      <i class="fas fa-cart-plus"></i>
                      @if(!empty($notif))
                      <span id="on-notif" class="badge rounded-pill badge-danger"> {{ $notif }}</span>
                      @endif

                  @if (Auth()->user()->level=="User")
                    <a href="{{url('/detail_transaction')}}">Transaction Report</a>
                  @endif
                  
                  <a href="{{url('/about_us')}}">About Us </i> </a>
                  <a href="#contactSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Contact Us</a>
                  <ul class="collapse list-unstyled bg-secondary" id="contactSubmenu">
                    <li>
                      <a href="https://wa.me/6285781063419"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                    </li>
                    <li>
                      <a href="https://www.facebook.com/dicky.oyong"><i class="fab fa-facebook-square"></i> Facebook</a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/fauzan_dky"><i class="fab fa-instagram"></i> Instagram</a>
                    </li>
                  </ul>
                  <a href="#temaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Theme</a>
                  <ul class="collapse list-unstyled bg-secondary" id="temaSubmenu">
                    <li>
                        Dark Mode
                        <label class="switch">
                          <input type="checkbox" onclick="darkTheme()">
                          <span class="slider round"></span>
                        </label>
                    </li>
                  </ul>
            </div>
            </nav>
            <nav class="navbar navbar-expand-md navbar-dark bg-secondary shadow-sm">
              <div id="main">
                <span style="font-size:30px; cursor:pointer; color: white;" onclick="openNav()">&#9776;</span>
              </div>
              <div id="notif">
                <?php 
                  $User = DB::table('users')
                      ->select('id')
                      ->get();
                    if(!empty($User))
                    {
                      $notif = DB::table('troli')
                      ->select('id_keranjang')
                      ->where('status', 0)
                      ->where('user_id', '=', Auth::user()->id)
                      ->count();
                    }
                ?>
                @if(!empty($notif))
                <span id="notif" class="badge rounded-pill badge-danger"> {{ $notif }}</span>
                @endif
              </div>
                <div class="container" id="main">
                  <a class="navbar-brand" href="{{ url('/home') }}">
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
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                  </li>
                              @endif
                          @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  	<i class="fa fa-address-card fa-lg"></i>
                                      {{ Auth::user()->name }} <span class="caret"></span>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{url('/profil')}}">
                                        <i class="fas fa-user-circle fa-lg"></i>
                                        {{ _('Profil') }}
                                      </a>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         	onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          <i class="fas fa-sign-out-alt fa-lg"></i>
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
              @yield('toko_kita')
          </main>
        </div>
        <script>
            function openNav() {
              document.getElementById("mySidenav").style.width = "300px";
              document.getElementById("main").style.marginLeft = "250px";
              document.getElementById("notif").style.display = "none";
              document.getElementById("on-notif").style.display = "inline-block";
            }

            function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
              document.getElementById("main").style.marginLeft= "0";
              document.getElementById("notif").style.display = "block";
              document.getElementById("on-notif").style.display = "none";
            }
            function darkTheme() {
               var element = document.body;
               element.classList.toggle("dark-mode");
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
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
    </body>
    <footer  id="main" class="footer py-3 bg-secondary text-center" style="margin-bottom: 0px;">
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
    
