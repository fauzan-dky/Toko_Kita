@extends('layouts/sidenav')
@section('toko_kita')
	<div class="container">
		<div class="card">
			<h1 class="card-tittle text-center">Pembayaran</h1>
			<div class="card-body">
				<input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>
				<?php $totalHarga = 0; ?>
				@foreach($barang as $list)
					<?php $totalHarga += $list->jumlah_harga ;?>
					<div id="Produk">
						<option value="{{$list->id_produk}},{{$list->nama_produk}},{{$list->harga_satuan}},{{$list->kategori}},{{$list->jumlah}},{{$list->jumlah_harga}}" hidden=""></option>
					</div>
				@endforeach
					<label for="nama">Nama</label>
					<input type="text" id="nama" name="nama" class="form-control" required="">

					<label for="email">Email</label>
					<input type="email" id="email" name="email" class="form-control" required="">
					
					<label for="wilayah_negara">Negara</label>
						<select onchange="validation_form_negara()" id="wilayah_negara" name="wilayah_negara" class="custom-select custom-select-sm" aria-describedby="wilayahNegaraHelpBlock" required="required">
	                      <option selected value="">Pilih</option>
	                      @foreach ($wilayah_negara as $row)
	                      <option data-tokens="ketchup mustard" value='{{ $row->idwilayah_negara, $row->nama_negara }}'>{{ $row->nama_negara }}</option>
	                      @endforeach
	                    </select>

					<label for="wilayah_provinsi">Provinsi</label>
						<select onchange="read_wilayah_kabupaten()" id="wilayah_provinsi" name="wilayah_provinsi" class="custom-select custom-select-sm" aria-describedby="wilayahProvinsiHelpBlock" required="required">
	                        <option selected value="">Pilih</option>
	                        @foreach ($wilayah_provinsi as $data)
	                            <option data-tokens="ketchup mustard" value='{{ $data->idwilayah_provinsi, $data->nama_provinsi }}'>{{ $data->nama_provinsi }}</option>
	                        @endforeach
	                     </select>

					<label for="wilayah_kabupaten">Kabupaten</label>
						<select onchange="read_wilayah_kecamatan()" id="wilayah_kabupaten" name="wilayah_kabupaten" class="custom-select custom-select-sm" aria-describedby="wilayahKabupatenHelpBlock" required="required">
	                        <option selected value="">Pilih</option>
	                    </select>

					<label for="wilayah_kecamatan">Kecamatan</label>
						<select onchange="read_wilayah_kelurahan()" id="wilayah_kecamatan" name="wilayah_kecamatan" class="custom-select custom-select-sm" aria-describedby="wilayahKecamatanHelpBlock" required="required">
	                        <option selected value="">Pilih</option>
	                    </select>

					<label for="wilayah_kelurahan">Kelurahan</label>
						<select id="wilayah_kelurahan" name="wilayah_kelurahan" class="custom-select custom-select-sm" aria-describedby="wilayahKelurahanHelpBlock" required="required">
	                        <option selected value="">Pilih</option>
	                    </select>

					<label for="alamat">Alamat</label>
					<textarea name="massage" id="alamat" rows="5" cols="20" class="form-control" required=""></textarea>
					
					<label for="nomor">Nomor Handphone</label>
					<input type="number" name="nomor" id="nomor" class="form-control" placeholder="085xxxxx" required="">

					<label for="jumlah_harga">Jumlah Pembayaran</label> :
					<input type="number" id="jumlah_pembayaran" name="jumlah_harga"  class="form-control" value="{{$totalHarga}}" onkeyup="sum();" readonly="">
					
					<label for="ongkir">Ongkos Kirim</label>
					<input type="number" name="ongkir" id="ongkir" class="form-control" value="10000" onkeyup="sum()" readonly="" placeholder="10000">
					
					<label for="bayar">Bayar</label>
					<input type="number" id="uang" name="bayar" class="form-control" onkeyup="sum();" required="">
					
					<label for="kembalian">Kembalian</label>
					<input type="number" id="kembalian" name="kembalian" id="kembalian" class="form-control" readonly="">

					<label for="metode">Metode Pembayaran</label>
					<select name="metode" id="metode" class="form-control">
						<option value="">--PILIH--</option>
						<option value="BNI">BNI</option>
						<option value="BRI">BRI</option>
						<option value="BCA">BCA</option>
						<option value="Mandiri">Mandiri</option>
						<option value="OVO">OVO</option>
						<option value="GoPay">GoPay</option>
						<option value="LinkAja">LinkAja</option>
					</select>
					
					<br>
					<a class="btn btn-primary text-white" href="{{url('/troli')}}">Kembali</a>
					<a class="btn btn-success text-white"  onclick="cekTransaksi()"><i class="fas fa-tag fa-lg"></i> Bayar</a>
			</div>
		</div>
	</div>
	<!--Modal Transaksi-->
		<div class="modal fade" id="modalTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="exampleModalLabel">Data Pembayaran</h5>
	                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	                </div>
	                <div class="modal-body">
	                    <label for="">Nama</label>
	                    <h5 id="namaTampil"></h5>
	                    <label for="">Email</label>
	                    <h5 id="emailTampil"></h5>
	                    <label for="">Nomor Handphone</label>
	                    <h5 id="nomorTampil"></h5>
	                    <label for="">Alamat</label>
                    	<h5 id="alamatTampil"></h5>
                    	<label for="">Kelurahan</label>
                    	<h5 id="kelurahanTampil"></h5>
                    	<label for="">Kecamatan</label>
                    	<h5 id="kecamatanTampil"></h5>
                    	<label for="">Kabupaten</label>
                    	<h5 id="kabupatenTampil"></h5>
                    	<label for="">Provinsi</label>
                    	<h5 id="provinsiTampil"></h5>
                    	<label for="">Negara</label>
                    	<h5 id="negaraTampil"></h5>
                    	<label for="">Jumlah Pembayaran</label>
                    	<h5 id="jumlahPembayaranTampil"></h5>
                    	<label for="">Ongkos Kirim</label>
                    	<h5 id="ongkirTampil"></h5>
                    	<label for="">Bayar</label>
                    	<h5 id="bayarTampil"></h5>
                    	<label for="">Kembalian</label>
                    	<h5 id="kembalianTampil"></h5>
                    	<label for="">Metode Pembayaran</label>
                    	<h5 id="metodeTampil"></h5>
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<a class="btn btn-success text-white"  onclick="transaksi()"><i class="fas fa-tag fa-lg" hidden=""></i> Bayar</a>
	                </div>
	            </div>
	        </div>
	    </div>
	<script>
		function sum() {
		      var jumlah_pembayaranNumberValue = document.getElementById('jumlah_pembayaran').value;
		      var bayarNumberValue = document.getElementById('uang').value;
		      var ongkirNumberValue = document.getElementById('ongkir').value;
		      var result = parseInt(bayarNumberValue) - parseInt(ongkirNumberValue) - parseInt(jumlah_pembayaranNumberValue) ;
		      if (!isNaN(result)) {
		         document.getElementById('kembalian').value = result;
		      }
		}
		function cekTransaksi () {
			var nama = document.getElementById('nama').value;
			var email = document.getElementById('email').value;
			var alamat = document.getElementById('alamat').value;
			var negara = document.getElementById('wilayah_negara').value;
			var provinsi = document.getElementById('wilayah_provinsi').value;
			var kabupaten = document.getElementById('wilayah_kabupaten').value;
			var kecamatan = document.getElementById('wilayah_kecamatan').value;
			var kelurahan = document.getElementById('wilayah_kelurahan').value;
			var nomor = document.getElementById('nomor').value;
			var jumlah_pembayaran = document.getElementById('jumlah_pembayaran').value;
			var ongkir = document.getElementById('ongkir').value;
			var uang = document.getElementById('uang').value;
			var kembalian = document.getElementById('kembalian').value;
			var metode = document.getElementById('metode').value;

			if (nama == "") {
				swal({
				  title: "Peringatan",
				  text: "Nama harus diisi!!!",
				  icon: "warning",
				});
			}
			else if (email == "") {
				swal({
				  title: "Peringatan",
				  text: "Email harus diisi!!!",
				  icon: "warning",
				});
			}
			else if (nomor == "") {
				swal({
				  title: "Peringatan",
				  text: "Nomor Handphone harus diisi!!!",
				  icon: "warning",
				});
			}
			else if (uang == "") {
				swal({
				  title: "Peringatan",
				  text: "Nominal Bayar harus diisi!!!",
				  icon: "warning",
				});
			}
			else if (alamat == "") {
				swal({
				  title: "Peringatan",
				  text: "Alamat harus diisi!!!",
				  icon: "warning",
				});
			}
			else if (metode == "") {
				swal({
				  title: "Peringatan",
				  text: "Metode Pembayaran harus diisi!!!",
				  icon: "warning",
				});
			}
			else if (nama != "" && email != "" && nomor != "" && uang != "" && alamat != "" && metode != "") 
			{
				$('#namaTampil').html(nama);
				$('#emailTampil').html(email);
                $('#nomorTampil').html(nomor);
                $('#alamatTampil').html(alamat);
                $('#negaraTampil').html(negara);
                $('#provinsiTampil').html(provinsi);
                $('#kabupatenTampil').html(kabupaten);
                $('#kecamatanTampil').html(kecamatan);
                $('#kelurahanTampil').html(kelurahan);
                $('#jumlahPembayaranTampil').html(jumlah_pembayaran);
                $('#ongkirTampil').html(ongkir);
                $('#bayarTampil').html(uang);
                $('#kembalianTampil').html(kembalian);
                $('#metodeTampil').html(metode);
                $('#modalTransaksi').modal('show');
			}
		}
		function transaksi () {
			var nama = document.getElementById('nama').value;
			var email = document.getElementById('email').value;
	        var no_hp = document.getElementById('nomor').value;
	        var alamat = document.getElementById('alamat').value;
	        var negara = document.getElementById('wilayah_negara').value;
			var provinsi = document.getElementById('wilayah_provinsi').value;
			var kabupaten = document.getElementById('wilayah_kabupaten').value;
			var kecamatan = document.getElementById('wilayah_kecamatan').value;
			var kelurahan = document.getElementById('wilayah_kelurahan').value;
	        var jumlah_pembayaran = document.getElementById('jumlah_pembayaran').value;
	        var uang = document.getElementById('uang').value;
	        var kembalian = document.getElementById('kembalian').value;
	        var metode_pembayaran = document.getElementById('metode').value;

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
				var my_url = "{{ url('/transaksi_pembayaran') }}";
				var formData = {
								'_token' : token,
								'nama' : nama,
								'email' : email,
								'no_hp' : no_hp,
								'alamat' : alamat,
								'negara': negara,
								'kabupaten': kabupaten,
								'provinsi': provinsi,
								'kecamatan': kecamatan,
								'kelurahan': kelurahan,
								'jumlah_pembayaran' : jumlah_pembayaran,
								'uang' : uang,
								'kembalian' : kembalian,
								'user_id' : user_id,
								'produk_id' : produk_id,
								'harga_satuan' : harga_satuan,
								'banyak' : banyak,
								'jumlah_harga' : jumlah_harga,
								'metode_pembayaran' :metode_pembayaran,
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
	function validation_form_negara(){
    var wilayah_negara = $('#wilayah_negara').val();
    if (wilayah_negara == 1) {
      $('#refresh_form_alamat_pengiriman').show();
      $('#refresh_data_user').show();
      $('#user_kabupaten').attr('required').val('');
      $('#no_rt').attr('required').val('');
      $('#no_rw').attr('required').val('');
      $('#wilayah_provinsi').attr('required', 'required').val('');
      $('#wilayah_kabupaten').attr('required', 'required').val('');
      $('#wilayah_kecamatan').attr('required', 'required').val('');
      $('#wilayah_kelurahan').attr('required', 'required').val('');
    }
    else {
      $('#refresh_form_alamat_pengiriman').hide();
      $('#refresh_data_user').hide();
      $('#user_kabupaten').removeAttr('required').val('');
      $('#no_rt').removeAttr('required').val('');
      $('#no_rw').removeAttr('required').val('');
      $('#wilayah_provinsi').removeAttr('required').val('');
      $('#wilayah_kabupaten').removeAttr('required').val('');
      $('#wilayah_kecamatan').removeAttr('required').val('');
      $('#wilayah_kelurahan').removeAttr('required').val('');
    }
  }

  function read_wilayah_kabupaten(){
      var wilayah_provinsi = $('#wilayah_provinsi').val();
      var token = '{{ csrf_token() }}';
      var my_url = "{{url('/read_wilayah_kabupaten')}}";
      var formData = {
                      '_token': token,
                      'wilayah_provinsi': wilayah_provinsi
                    };
      $.ajax({
        method: 'POST',
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function(data){
            wilayah_kabupaten = "<option value=''>Pilih</option>";
            $.each(data, function(i,n){
              wilayah_kabupaten = wilayah_kabupaten + '<option data-tokens="ketchup mustard" value="' + n["idwilayah_kabupaten"] + '">'+ n["nama_kabupaten"] + '</option>';
            });

            $("#wilayah_kabupaten").html(wilayah_kabupaten);
            $("#wilayah_kabupaten").val('');
            $("#wilayah_kecamatan").val('');
            $("#wilayah_kelurahan").val('');
        },

        error: function(data){
            console.log(data);
            alert("error" + ' ' + this.data);
        },

      });
  }
    function read_wilayah_kecamatan(){
      var wilayah_kabupaten = $('#wilayah_kabupaten').val();
      var token = '{{ csrf_token() }}';
      var my_url = "{{url('/read_wilayah_kecamatan')}}";
      var formData = {
                      '_token': token,
                      'wilayah_kabupaten': wilayah_kabupaten
                    };
      $.ajax({
        method: 'POST',
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function(data){
            wilayah_kecamatan = "<option value=''>Pilih</option>";
            $.each(data, function(i,n){
              wilayah_kecamatan = wilayah_kecamatan + '<option data-tokens="ketchup mustard" value="' + n["idwilayah_kecamatan"] + '">'+ n["nama_kecamatan"] + '</option>';
            });
            $("#wilayah_kecamatan").html(wilayah_kecamatan);
            $("#wilayah_kecamatan").val('');
            $("#wilayah_kelurahan").val('');
        },

        error: function(data){
            console.log(data);
            alert("error" + ' ' + this.data);
        },

      });
    }
  function read_wilayah_kelurahan(){
    var wilayah_kecamatan = $('#wilayah_kecamatan').val();
    var token = '{{ csrf_token() }}';
    var my_url = "{{url('/read_wilayah_kelurahan')}}";
    var formData = {
                    '_token': token,
                    'wilayah_kecamatan': wilayah_kecamatan
                  };
    $.ajax({
      method: 'POST',
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function(data){
          wilayah_kelurahan = "<option value=''>Pilih</option>";
          $.each(data, function(i,n){
            wilayah_kelurahan = wilayah_kelurahan + '<option data-tokens="ketchup mustard" value="' + n["idwilayah_kelurahan"] + '">'+ n["nama_kelurahan"] + '</option>';
          });
          $("#wilayah_kelurahan").html(wilayah_kelurahan);
          $("#wilayah_kelurahan").val('');
      },

      error: function(data){
          console.log(data);
          alert("error" + ' ' + this.data);
      },

    });
  }
	</script>
@endsection