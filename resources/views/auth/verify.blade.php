@extends('layouts.sidenav')

@section('toko_kita')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifikasi Email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link verifikasi baru telah dikirim ke email kamu!
                        </div>
                    @endif

                    Sebelum melanjutkan, silahkan verifikasi email terlebih dahulu!
                    Jika kamu tidak menerima pesan link verifikasi, <a href="{{ route('verification.resend') }}">klik tombol ini</a>  untuk mendapaktan link verifiaksi baru.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
