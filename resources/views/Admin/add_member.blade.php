@extends('layouts/sidenav')
@section('toko_kita')
	<div class="container">
		<div class="card bg-light">
			<h1 class="card-tittle text-center">Tambah Anggota dan Pengurus</h1>
			<div class="card-body">
				<form method="post" action="{{url('/save_member')}}">
					@csrf
					<div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" required autocomplete="name" placeholder="Tulis nama">
                        </div>
                    </div>
                    <div class="form-group row">
                    	<label for="level" class="col-md-4 col-form-label text-md-right">Level</label>

                        <div class="col-md-6">
                            <select class="form-control" name="level" id="level">
                                <option value="">--Pilih--</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email" placeholder="admin@gmail.com">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambah
                                </button>
                            </div>
                        </div>
				</form>
			</div>
			
		</div>
	</div>
@endsection