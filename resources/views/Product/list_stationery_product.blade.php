@extends('layouts/sidenav')
@section('toko_kita')
	<div class="container mt-5 mb-5" >
		<div class="row">
			<h1 class="text-center">Daftar Produk Alat Tulis</h1>
			@foreach($listProduct as $list)
			<div class="col-md-4 mt-3" >
				<div class="card mt-4 card-product" >
					<div class="align-items-center p-2">
					<center>
						<img src="{{asset('/upload_file/'.$list->foto_produk)}}" class="img-fluid" style="width: 200px; height: 200px; margin-top: 30px;">
					</center>
					<div class="card-body">
						<h5 class="card-tittle text-center">{{$list->nama_produk}}</h5>
						<p class="card-text" style="text-align: left; color: black;">
							<strong>Harga	: </strong>Rp {{number_format($list->harga_satuan,2,',','.')}} <br>
							<strong>Stok	: </strong>{{$list->stok}}
						</p>
						<center>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</center>
						<br>
						<center>
						@if (Auth()->user()->level=="Admin")
							<a class="btn btn-danger btn-sm text-white" 
							onclick="hapusProduk({{$list->id}})"><i class="fas fa-trash-alt fa-lg"></i> Hapus </a>
							<!--Delete Button-->
							<a class="btn btn-primary btn-sm" href="{{url('edit_product_stationery/'.$list->id)}}"><i class="fa fa-edit fa-lg"></i> Edit </a><!--Edit Button-->
							<br><br>
						@endif
						<a class="btn btn-secondary btn-sm" href="#{{$list->id}}" data-bs-toggle="modal" data-bs-target="#modal{{$list->id}}"><i class="fa fa-eye fa-lg"></i> Detail </a><!--Detail Button-->
						<a class="btn btn-success btn-sm" href="#{{$list->id}}" data-bs-toggle="modal" data-bs-target="#modalKeranjang{{$list->id}}"><i class="fas fa-cart-plus fa-lg"></i> Keranjang </a><!--Cart Button-->
						</center>

					</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		{{$listProduct->links()}}
	</div>
	<script>
		function hapusProduk (id_produk) {
				var token = '{{ csrf_token() }}';
				var my_url = "{{ url('/delete_stationery') }}";
				var formData = {
								'_token' : token,
								'id' : id_produk
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
	</script>
@endsection

<!-- Modal Detail-->
@foreach($listProduct as $list)
<div class="modal fade" id="modal{{$list->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
		    <div class="modal-content">
		      	<div class="modal-header bg-primary text-white">
		        	<h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
		        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      	</div>
			      	<div class="modal-body">
					<table class="table table-borderless mt-3">
						<tr>
							<th></th>
							<td> <img src="{{asset('/upload_file/'.$list->foto_produk)}}" class="img-fluid" style="width: 300px;"></td>
						</tr>
						<tr>
							<th>Nama Produk</th>
							<td> {{$list->nama_produk}}</td>
						</tr>
						<tr>
							<th>Harga Satuan</th>
							<td> Rp {{number_format($list->harga_satuan,2,',','.')}}</td>
						</tr>
						<tr>
							<th>Stok</th>
							<td> {{$list->stok}}</td>
						</tr>
						<tr>
							<th>Kategori</th>
							<td> {{$list->kategori}}</td>
						</tr>
						<tr>
							<th>Deskripsi</th>
							<td> {{$list->deskripsi}}</td>
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

<!-- Modal Keranjang-->
@foreach($listProduct as $list)
<div class="modal fade" id="modalKeranjang{{$list->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header bg-danger text-white">
	        	<h5 class="modal-title" id="exampleModalLabel">Tambahkan Ke Keranjang</h5>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
		      	<div class="modal-body ">
				<table class="table table-borderless mt-3 text-center">
					<tr>
						<td> <img src="{{asset('/upload_file/'.$list->foto_produk)}}" class="img-fluid" style="width: 300px;"></td>
					</tr>
					<tr>
						<th> {{$list->nama_produk}}</th>
					</tr>
					<tr>
						<th> Rp {{number_format($list->harga_satuan,2,',','.')}}</th>
					</tr>
					<tr>
						<th>Stok : {{$list->stok}}</th>
					</tr>
				</table>
		      	</div>
      		<div class="modal-footer">
      			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      			<a class="btn btn-success btn-sm" href="{{url('/add_cart/'.$list->id)}}"><i class="fas fa-cart-plus fa-lg"></i> Keranjang </a><!--Cart Button-->      		
	      </div>
	    </div>
  	</div>
</div>
@endforeach