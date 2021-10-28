@extends('layouts/sidenav')
@section('toko_kita')
	<div class="container">
		<div class="card">
			<h1 class="card-tittle text-center"><i class="fas fa-cart-plus"></i> Troli</h1>
			<input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>
			@foreach($listProduct as $list)
			<div id="Produk">
				<option value="{{$list->id}},{{$list->nama_produk}},{{$list->harga_satuan}},{{$list->kategori}}" hidden=""></option>
			</div>
			@endforeach
			<div class="card-body">
				<table class="table table-dark table-hover mt-3 p-2">
				<thead>
					<tr style="text-align: center;">
						<th scope="col" >ID</th>
					    <th scope="col" >Nama Produk</th>
					    <th scope="col" >Harga Satuan</th>
					    <th scope="col" >Kategori</th>
					    <th scope="col" >Banyak</th>
					    <th scope="col" >Jumlah Harga</th>
					    <th scope="col" >Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$totalHarga = 0;
						$id = 1;
					?>
					@foreach($TroliList as $listKeranjang)
						<tr style="text-align: center;">
							<th scope="row" >{{$id++}}</th>
							<td>{{$listKeranjang->nama_produk}}</td>
							<td>Rp {{number_format($listKeranjang->harga_satuan,2,',','.')}}</td>
							<td>{{$listKeranjang->kategori}}</td>
							<td>{{$listKeranjang->jumlah}}</td>
							<td>Rp {{number_format($listKeranjang->jumlah_harga,2,',','.')}}</td>
							<td>
								<a class="btn btn-danger btn-sm" 
								onclick="deleteFromCart({{$listKeranjang->id_keranjang}})"><i class="fas fa-trash-alt fa-lg"></i> Hapus </a>
									<!--Delete Button-->
								
								<a class="btn btn-secondary btn-sm" 
								onclick="detailCart({{$listKeranjang->id_keranjang}})"><i class="fa fa-eye fa-lg"></i> Detail </a>
									<!--Detail Button-->
							</td>
							<?php $totalHarga += $listKeranjang->jumlah_harga ;?>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" style="text-align: center;"><b>Total Harga</b></td>
						<td style="text-align: center;"><b>Rp {{number_format($totalHarga,2,',','.')}}</b></td>
					</tr>
				</tfoot>
			</table>
			<div style="text-align: right;">
				<a class="btn btn-danger text-white" onclick="deleteAll()"><i class="fas fa-trash-alt fa-lg"></i> Hapus Semua</a>
				<a class="btn btn-success text-white" href="{{url('/transaksi')}}"><i class="fas fa-tag fa-lg"></i> Bayar</a>
			</div>
			</div>
		</div>
	</div>
	<script>
		function deleteFromCart (id_keranjang) {
			var token = '{{ csrf_token() }}';
			var my_url = "{{ url('/delete_from_cart') }}";
			var formData = {
							'_token' : token,
							'id_keranjang' : id_keranjang
							};
			var konfirmasi = confirm('Apakah kamu yakin mau menghapus produk ini dari keranjang?');
			if (konfirmasi) {
				$.ajax({
				method : 'post',
				url : my_url,
				data : formData,

				//Sukses
				success:function (resp) {
					swal({
					  title: "Sukses",
					  text: "Berhasil menghapus produk dari keranjang!!!",
					  icon: "success",
					});
					location.reload();
				},

				//Gagal
				error:function (resp) {
					swal({
					  title: "Peringatan",
					  text: "Gagal menghapus produk dari keranjang!!!",
					  icon: "warning",
					});
				}
				});	
			}
		}
		function deleteAll () {
			var token = '{{ csrf_token() }}';
			var my_url = "{{ url('/delete_all') }}";
			var formData = {
							'_token' : token
							};
			var konfirmasi = confirm('Apakah kamu yakin mau menghapus semua produk dari keranjang?');
			if (konfirmasi) {
				$.ajax({
				method : 'post',
				url : my_url,
				data : formData,

				//Sukses
				success:function (resp) {
					swal({
					  title: "Sukses",
					  text: "Berhasil menghapus semua produk dari keranjang!!!",
					  icon: "success",
					});
					location.reload();
				},

				//Gagal
				error:function (resp) {
					swal({
					  title: "Peringatan",
					  text: "Gagal menghapus semua produk dari keranjang!!!",
					  icon: "warning",
					});
				}
				});	
			}
		}
		function detailCart (id_keranjang) {
			$.ajax({
				method : 'post',
				url : '{{url('detail_cart')}}',
				data : {
					'_token' : '{{ csrf_token() }}',
					'id_keranjang' : id_keranjang
				},
				success:function (resp){
					$('#detail').html(resp);
					$('#modalDetail').modal('show');
				},
				error:function (resp){
					swal({
						  title: "Peringatan",
						  text: "Gagal melihat detail keranjang!!!",
						  icon: "warning",
						});
					console.log(resp);
				}
			});
		}
		function transaksi () {
			var user_id = $('#user_id').val();
			var Produk = $('#Produk').val();
			var arrayProduk = Produk.split(',');
			var jumlahProduk = $('#jumlahProduk').val();
			arrayProduk.push(jumlahProduk);

			var produk_id = arrayProduk[0]; 
			var harga_satuan = arrayProduk[2];
			var banyak = arrayProduk[4];
			var jumlah_harga = banyak*harga_satuan;

		
				var token = '{{ csrf_token() }}';
				var my_url = "{{ url('/transaksi') }}";
				var formData = {
								'_token' : token,
								'user_id' : user_id,
								'produk_id' : produk_id,
								'harga_satuan' : harga_satuan,
								'banyak' : banyak,
								'jumlah_harga' : jumlah_harga,
								};
				$.ajax({
					method : 'post',
					url : my_url,
					data : formData,

					//Sukses
					success:function(resp) {
						swal({
						  title: "Sukses",
						  text: "Berhasil melakukan transaksi!!!",
						  icon: "success",
						});
						location.reload();
					},

					//Gagal
					error:function (resp) {
						swal({
						  title: "Peringatan",
						  text: "Gagal melakukan transaksi!!!",
						  icon: "warning",
						});
					}
				});	
			
		}
	</script>
@endsection
<!-- Modal Detail-->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
		    <div class="modal-content" id="modal-content">
		      	<div class="modal-header bg-secondary text-white" id="modal-header">
		        	<h5 class="modal-title" id="judul">Detail Produk</h5>
		        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      	</div>
			      	<div class="modal-body" id="detail">
					...
			      	</div>
	      		<div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
	      </div>
	    </div>
  	</div>
</div>