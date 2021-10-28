@extends('layouts/sidenav')
@section('toko_kita')
	<div class="container">
		<div class="card">
			<h1 class="card-tittle text-center">Pengaturan Akun</h1>
			<input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>
			<div class="card-body" style="padding: 30px; margin: 20px;">
				@foreach($Account as $data)
				<table class="table table-borderless">
					<h5><i class="fas fa-info"></i> Informasi Umum</h5>
					<tr>
						<th>Nama</th>
						<td>:</td>
						<td>
							<input type="text" id="nama" name="nama" class="form-control" value="{{$data->name}}" required>
						</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>:</td>
						<td>
							<input type="email" id="email" name="email" class="form-control" value="{{$data->email}}" required>
						</td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td>:</td>
						<td>
							<textarea name="massage" id="alamat" rows="5" cols="20" class="form-control" placeholder="Tuliskan alamat" required>{{$data->alamat}}</textarea>
						</td>
					</tr>
					<tr>
						<th>Nomor Handphone</th>
						<td>:</td>
						<td>
							<input type="text" id="nomor" name="nomor" class="form-control" value="{{$data->nomor_hp}}" placeholder="085****" required>
						</td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<td>:</td>
						<td>
							<select id="gender" class="form-control" required>
								<option value="">--Pilih--</option>
								<option value="Laki-Laki">Laki-Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</td>
					</tr>
				</table>
				<table class="table table-borderless">
					<h5><i class="fas fa-lock"></i> Ganti Password</h5>
					<tr>
						<th>Password</th>
						<td>:</td>
						<td>
							<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required="" autocomplete="current-password">
							@error('password')
		                        <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
						</td>
					</tr>
					<tr>
						<th>Konfirmasi Password</th>
						<td>:</td>
						<td>
							<input type="password" name="confirmation-password" id="confirmation-password" class="form-control" required="" autocomplete="new-password">
						</td>
					</tr>
				</table>
				@endforeach
				<a class="btn btn-secondary text-white" href="{{url('/profil')}}">Kembali</a>
				<a class="btn btn-primary text-white" style="float: right;" onclick="simpan()"><i class="fas fa-save fa-lg"></i> Simpan</a>
			</div>
		</div>
	</div>
	<script>
		function simpan() {
			var nama = document.getElementById('nama').value;
			var email = document.getElementById('email').value;
			var alamat = document.getElementById('alamat').value;
			var no_hp = document.getElementById('nomor').value;
			var jenis_kelamin = document.getElementById('gender').value;
			var password = document.getElementById('password').value;
			var confirmation_password = document.getElementById('confirmation-password').value;



				var token = '{{ csrf_token() }}';
				var my_url = "{{ url('/save_account') }}";
				var formData = {
								'_token' : token,
								'nama' : nama,
								'no_hp' : no_hp,
								'alamat' : alamat,
								'email' : email,
								'jenis_kelamin' : jenis_kelamin,
								'password' : password
								};
				if (password != confirmation_password) {
					swal({
						  title: "Peringatan",
						  text: "Konfirmasi password tidak benar!",
						  icon: "warning",
						});
				}
				else {
					$.ajax({
					method : 'post',
					url : my_url,
					data : formData,

					//Sukses
					success:function(resp) {
						swal({
						  title: "Sukses",
						  text: "Berhasil menyimpan data akun!!!",
						  icon: "success",
						});
						location.reload();
					},

					//Gagal
					error:function (resp) {
						swal({
						  title: "Peringatan",
						  text: "Gagal menyimpan data akun!!!",
						  icon: "warning",
						});
					}
				});
				
		}
				}
				
	</script>
@endsection