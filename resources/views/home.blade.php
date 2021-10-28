@extends('layouts.sidenav')
@section('toko_kita')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat Datang {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="text-center mt-3">Produk Elektronik</h5>
                <div class="card-body mt-3">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <a href="{{url('/list_electronic_product')}}"><img src="{{ asset('Produk/elc/MI TV 55in.jpg') }}" class="d-block w-100"></a>
                        </div>
                        <div class="carousel-item">
                          <a href="{{url('/list_electronic_product')}}"><img src="{{ asset('Produk/elc/Samsung Sound Bar.jpg') }}" class="d-block w-100"></a>
                        </div>
                        <div class="carousel-item">
                          <a href="{{url('/list_electronic_product')}}"><img src="{{ asset('Produk/elc/kulkas 2 pintu.jpg') }}" class="d-block w-100"></a>
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="text-center mt-3">Produk Makanan</h5>
                <div class="card-body mt-3">
                    <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <a href="{{url('/list_food_product')}}"><img src="{{ asset('Produk/food/daging ayam.jpg') }}" class="d-block w-100"></a>
                        </div>
                        <div class="carousel-item">
                          <a href="{{url('/list_food_product')}}"><img src="{{ asset('Produk/food/bawang merah.jpg') }}" class="d-block w-100"></a>
                        </div>
                        <div class="carousel-item">
                          <a href="{{url('/list_food_product')}}"><img src="{{ asset('Produk/food/mie instan.jpg') }}" class="d-block w-100"></a>
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2"  data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2"  data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="text-center mt-3">Produk Alat Tulis</h5>
                <div class="card-body mt-3">
                    <div id="carouselExampleControls3" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <a href="{{url('/list_stationery_product')}}"><img src="{{ asset('Produk/atk/bolpoin standard.jpg') }}" class="d-block w-100"></a>
                        </div>
                        <div class="carousel-item">
                          <a href="{{url('/list_stationery_product')}}"><img src="{{ asset('Produk/atk/buku gambar.jpg') }}" class="d-block w-100"></a>
                        </div>
                        <div class="carousel-item">
                          <a href="{{url('/list_stationery_product')}}"><img src="{{ asset('Produk/atk/penggaris.jpg') }}" class="d-block w-100"></a>
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls3"  data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls3"  data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
