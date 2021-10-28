@extends('layouts/sidenav')
@section('toko_kita')
	<div class="container mt-5 mb-5" >
		<div class="row">
			<div class="card mt-4" >
			<h1 class="card-tittle text-center">Daftar Pengurus dan Anggota</h1>
				<div class="card-body">
					<table class="table table-dark table-hover mt-3 text-center">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Nama</th>
								<th scope="col">Level</th>
								<th scope="col">Email</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $id = 1; ?>
							@foreach($memberList as $list)
							<tr>
								<th scope="row">{{$id++}}</th>
								<td>{{$list->name}}</td>
								<td>{{$list->level}}</td>
								<td>{{$list->email}}</td>
								<td>
									<a class="btn btn-danger btn-sm text-white" onclick="hapusMember({{$list->id}})"><i class="fas fa-trash-alt fa-lg"></i> Hapus </a>
					      	
							      	<a class="btn btn-primary btn-sm" href="{{url('/edit_member/'.$list->id)}}"><i class="fa fa-edit fa-lg"></i> Ubah </a><!--Update Button-->		
							      		
							      	<a class="btn btn-secondary btn-sm" href="#{{$list->id}}" data-bs-toggle="modal" data-bs-target="#modal{{$list->id}}"><i class="fa fa-eye fa-lg"></i> Detail </a><!--Detail Button-->
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script>
		function hapusMember (id_member) {
			var token = '{{ csrf_token() }}';
			var my_url = "{{ url('/delete_member') }}";
			var formData = {
							'_token' : token,
							'id' : id_member
							};
			var konfirmasi = confirm('Apakah kamu yakin mau menghapus anggotta ini dari daftar anggota?');
			if (konfirmasi) {
				$.ajax({
				method : 'post',
				url : my_url,
				data : formData,

				//Sukses
				success:function (resp) {
					swal({
					  title: "Sukses",
					  text: "Berhasil menghapus anggota dari daftar anggota!!!",
					  icon: "success",
					});
					location.reload();
				},

				//Gagal
				error:function (resp) {
					swal({
					  title: "Peringatan",
					  text: "Gagal menghapus anggota dari daftar anggota!!!",
					  icon: "warning",
					});
				}
			});	
			}
		}
	</script>
@endsection

<!-- Modal Detail-->
@foreach($memberList as $list)
<div class="modal fade" id="modal{{$list->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header bg-dark text-white">
	        	<h5 class="modal-title" id="exampleModalLabel">Detail Pengguna</h5>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
		      	<div class="modal-body">
				<table class="table table-info table-hover mt-3">
					<tr>
						<th>Nama</th>
						<td>: {{$list->name}}</td>
					</tr>
					<tr>
						<th>Level</th>
						<td>: {{$list->level}}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>: {{$list->email}}</td>
					</tr>
					<tr>
						<th>Tanggal Bergabung</th>
						<td>: {{$list->created_at}}</td>
					</tr>
				</table>
		      	</div>
	      		<div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	      </div>
	    </div>
  	</div>
</div>
@endforeach