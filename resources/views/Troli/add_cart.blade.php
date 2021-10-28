@extends('layouts/sidenav')
@section('toko_kita')
	<div class="container">
		<div class="col-md-12">
			<div class="card">
				<h1 class="card-tittle text-center mt-4">Tambahkan Ke Keranjang</h1>
				<div class="card-body">
					<input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>
					<h5 class="mt-2 text-center">{{$list->nama_produk}}</h5>
					<div class="row">
						<div class="col-md-6 text-center mt-3">
							<img src="{{asset('/upload_file/'.$list->foto_produk)}}" class="img-fluid" style="width: 300px;">
						</div>
						<div class="col-md-6 mt-3">
							<input type="text" name="id_produk" id="id_produk" value="{{$list->id}}" hidden="">
							<table class="table table-borderless">
							<tr>
								<th>Harga</th>
								<td>: Rp {{number_format($list->harga_satuan,2,',','.')}}</td>
								<input type="number" name="harga_satuan" id="harga_satuan" value="{{$list->harga_satuan}}" hidden="">
							</tr>
							<tr>
								<th>Kategori</th>
								<td>: {{$list->kategori}}</td>
							</tr>
							<tr>
								<th>Stok</th>
								<td>: {{$list->stok}}</td>
							</tr>
							<tr>
								<th>
									<label for="jumlah"><b>Jumlah</b></label>
								</th>
								<td>
									<input class="form-control" type="number" name="jumlah" id="jumlah" required="">
								</td>
							</tr>
							<tr>
								<th></th>
								<td>
									<button type="button" class="btn btn-success" onclick="savetoCart()"><i class="fa fa-cart-plus fa-lg"></i> Tambahkan Ke Keranjang</button>
								</td>
							</tr>
						</table>
						</div>
					</div>
					<div style="text-align: right;">
						<a class="btn btn-secondary" href="{{url('/troli')}}"><i class="fas fa-cart-plus"></i> Keranjang</a>
						<a class="btn btn-primary" href="{{url('/list_food_product')}}"><i class="fas fa-utensils"></i> Tambah</a>
						<a class="btn btn-primary" href="{{url('/list_electronic_product')}}"><i class="fas fa-plug"></i> Tambah</a>
						<a class="btn btn-primary" href="{{url('/list_stationery_product')}}"><i class="fas fa-book"></i> Tambah</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<script>
	function savetoCart () {

		var user_id = $('#user_id').val();
		var id_produk = $('#id_produk').val(); 
		var harga_satuan = $('#harga_satuan').val();
		var jumlah = $('#jumlah').val();
		var jumlah_harga = jumlah*harga_satuan;

		if (jumlah <= 0) {
			swal({
			  title: "Peringatan",
			  text: "Jumlah harus diisi, setidaknya 1 buah!!!",
			  icon: "warning",
			});
		}
		else {
			var token = '{{ csrf_token() }}';
			var my_url = "{{ url('/save_to_cart') }}";
			var formData = {
							'_token' : token,
							'user_id' : user_id,
							'id_produk' : id_produk,
							'harga_satuan' : harga_satuan,
							'jumlah' : jumlah,
							'jumlah_harga' : jumlah_harga
							};
			$.ajax({
				method : 'post',
				url : my_url,
				data : formData,

				//Sukses
				success:function(resp) {
					swal({
					  title: "Sukses",
					  text: "Berhasil memasukkan ke keranjang!!!",
					  icon: "success",
					});
					location.reload();
				},

				//Gagal
				error:function (resp) {
					swal({
					  title: "Peringatan",
					  text: "Gagal memasukkan ke keranjang!!!",
					  icon: "warning",
					});
				}
			});	
		}
	}
	
</script>
@endsection