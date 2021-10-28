@extends('layouts.sidenav')
@section('toko_kita')
<head>
    <link rel="stylesheet" href="{{asset ('/css/profil.css')}}">
</head>
    <body>
    	<h1 class="text-center">Informasi Akun</h1>
		<div class="card-profil">
			<input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>
			<div class="card-body">
				<h1 id="icon" class="text-center"><i class="fas fa-user-circle"></i></h1>
				<table class="table table-borderless">
					@foreach($Account as $data)
					@if($data->alamat=="")
						<h5 class="text-center" style="color: red;"><strong>**Lengkapi profil terlebih dahulu!!!**</strong></h5>
					@endif
					<tr>
						<th>Nama</th>
						<td>:</td>
						<td>{{$data->name}}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>:</td>
						<td>{{$data->email}}</td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td>:</td>
						<td>{{$data->alamat}}
						</td>
					</tr>
					<tr>
						<th>Nomor Handphone</th>
						<td>:</td>
						<td>{{$data->nomor_hp}}</td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<td>:</td>
						<td>{{$data->jenis_kelamin}}</td>
					</tr>
					@endforeach
				</table>
					<a class="btn btn-secondary text-white" href="{{url('/profil_setting')}}"><i class="fas fa-user-cog fa-lg"></i> Pengaturan Akun</a>				
			</div>
		</div>
	</body>
@endsection