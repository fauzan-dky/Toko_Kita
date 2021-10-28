@extends('layouts/sidenav')
@section('toko_kita')
	@if(session('success'))
		<div class="alert alert-success" role="alert">
		  {{session('success')}}<!--ALERT TAMBAH PRODUK-->
		</div>
	@endif
	<div class="container">
		<div class="card bg-info p-4">
			<h1 class="card-tittle text-center">Tambah Produk</h1>
			<div class="card-body">
				<form action="{{url('/save_product')}}" method="post" enctype="multipart/form-data">
					@csrf
					<label for="nama_produk">Nama:</label>
					<input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk">
					
					<label for="harga_satuan">Harga Satuan:</label>
					<input type="number" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Harga Satuan">
					
					<label for="stok">Stok:</label>
					<input type="number" class="form-control" id="stok" name="stok" placeholder="Jumlah Stok">
					
					<label for="kategori">Kategori:</label><br>
					<select id="kategori" name="kategori" class="form-control">
						<option value="">Pilih Kategori</option>
						<option value="Makanan">Makanan</option>
						<option value="Elektronik">Elektronik</option>
						<option value="Alat Tulis">Alat Tulis</option>
					</select>
					
					<label for="foto_produk">Foto Produk</label><!--Upload File-->
					<input type="file" class="form-control" id="foto_produk" name="foto_produk">

					<label for="deskripsi">Deskripsi:</label>
					<textarea id="deskripsi" name="deskripsi" rows="5" cols="20" class="form-control" placeholder="Tambah deskripsi"></textarea>
					<br>
					<button id="A" class="btn btn-success" type="button" onclick="validasiData()"><i class="fa fa-share-square-o fa-lg"></i> Kirim</button><!--Validasi Form-->
					
					<button id="submitData" class="btn btn-success" type="submit" hidden><i class="fa fa-share-square-o fa-lg"></i> Kirim</button>
				</form>
			</div>
		</div>
	</div>
	<!--Modal Simpan Produk-->
		<div class="modal fade" id="modalSimpanProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="exampleModalLabel">Data Produk</h5>
	                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	                </div>
	                <div class="modal-body">
	                    <label for="">Nama Produk</label>
	                    <h5 id="namaProdukTampil"></h5>
	                    <label for="">Harga Satuan</label>
	                    <h5 id="hargaSatuanTampil"></h5>
	                    <label for="">Stok</label>
                    	<h5 id="stokTampil"></h5>
                    	<label for="">Kategori</label>
                    	<h5 id="kategoriTampil"></h5>
                    	<label for="">Foto Produk</label>
                    	<h5 id="fotoProdukTampil"></h5>
                    	<label for="">Deskripsi</label>
                    	<h5 id="deskripsiTampil"></h5>
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
	                    <button type="button" class="btn btn-success" onclick="simpanData()">Kirim</button>
	                </div>
	            </div>
	        </div>
	    </div>
	<script>
		function validasiData () {
			var namaProduk = document.getElementById('nama_produk').value;
			var hargaSatuan = document.getElementById('harga_satuan').value;
			var stok = document.getElementById('stok').value;
			var kategori = document.getElementById('kategori').value;
			var fotoProduk = document.getElementById('foto_produk').value;
			var deskripsi = document.getElementById('deskripsi').value;

			if (namaProduk == "") {
				swal({
				  title: "Peringatan",
				  text: "Nama produk harus diisi!!!",
				  icon: "warning",
				});
			}
			else if (hargaSatuan == "") {
				swal({
				  title: "Peringatan",
				  text: "Harga harus diisi!!!",
				  icon: "warning",
				});
			}
			else if (stok == "") {
				swal({
				  title: "Peringatan",
				  text: "Stok harus diisi!!!",
				  icon: "warning",
				});
			}
			else if (kategori == "") {
				swal({
				  title: "Peringatan",
				  text: "Kategori diisi!!!",
				  icon: "warning",
				});
			}
			else if (fotoProduk == "") {
				swal({
				  title: "Peringatan",
				  text: "Foto produk harus diisi!!!",
				  icon: "warning",
				});
			}
			else if (deskripsi == "") {
				swal({
				  title: "Peringatan",
				  text: "Deskripsi diisi!!!",
				  icon: "warning",
				});
			}
			else if (namaProduk != "" && hargaSatuan != "" && stok != "" && kategori != "" && fotoProduk != "" && deskripsi != "") 
			{
				$('#namaProdukTampil').html(namaProduk);
                $('#hargaSatuanTampil').html(hargaSatuan);
                $('#stokTampil').html(stok);
                $('#kategoriTampil').html(kategori);
                $('#fotoProdukTampil').html(fotoProduk);
                $('#deskripsiTampil').html(deskripsi);
                $('#modalSimpanProduk').modal('show');
			}
		}
		function simpanData(){
            document.getElementById('submitData').click();
        }
	</script>
@endsection