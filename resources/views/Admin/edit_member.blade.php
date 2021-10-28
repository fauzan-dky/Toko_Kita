@extends('layouts/sidenav')
@section('toko_kita')
	<div class="container">
		<div class="card bg-light">
			<h1 class="card-tittle text-center">Ubah Data Pengurus dan Anggota</h1>
			<div class="card-body">
				<form action="{{url('/save_edited_member')}}" method="post">
					@csrf
					<div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" required autocomplete="name" placeholder="Tulis nama" value="{{$data->name}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                    	<label for="level" class="col-md-4 col-form-label text-md-right">Level</label>

                        <div class="col-md-6">
                            <select class="form-control" name="level" id="level">
                                <option value="">--Pilih Level--</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email" placeholder="admin@gmail.com" value="{{$data->email}}" >
                        </div>
                    </div>
                    <input type="password" name="password" class="form-control" hidden="">
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button id="submitData"  class="btn btn-success" type="submit"><i class="fa fa-edit fa-lg"></i> Ubah</button>
                        </div>
                    </div>
                    <input type="text" value="{{$data->id}}" name="id" hidden="">
				</form>
			</div>
		</div>
	</div>
@endsection