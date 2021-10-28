<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts/sidenav')
@section('toko_kita')
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="card">
					<h1 class="card-tittle text-center">Riwayat Transaksi</h1>
					<div class="card-body">
						<table class="table table-bordered table-info">
							<thead>
								<tr style="text-align: center;">
									<th scope="cols">ID</th>
									<th scope="cols">Tanggal</th>
									<th scope="cols">Nama</th>
									<th scope="cols">Email</th>
									<th scope="cols">Alamat</th>
									<th scope="cols">Nomor HP</th>
									<th scope="cols">Jumlah Pembayaran</th>
									<th scope="cols">Metode Pembayaran</th>
									<th scope="cols">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $id = 1;?>
								@foreach($detail as $details)
								<tr style="text-align: center;">
									<th scope="row">{{$id++}}</th>
									<td>{{$details->created_at}}</td>
									<td>{{$details->nama}}</td>
									<td>{{$details->email}}</td>
									<td>{{$details->alamat}}</td>
									<td>{{$details->nomor_hp}}</td>
									<td>Rp {{number_format($details->jumlah_pembayaran,2,',','.')}}</td>
									<td>{{$details->metode_pembayaran}}</td>
									<td>
										<a class="btn btn-secondary btn-sm text-white" 
										onclick="tampil_detailTransaksi({{$details->id_transaksidetails}})"><i class="fa fa-eye fa-lg"></i></a>
										<br><br>
										<!-- <a  class="btn btn-info btn-sm text-white" 
										onclick="cetak_riwayat_Transaksi({{$details->id_transaksidetails}})"><i class="fa fa-print fa-lg"></i> Cetak </a> -->
										<a  class="btn btn-info btn-sm text-white" target="_blank" 
										href="{{url('/cetak_riwayat_Transaksi/'.$details->id_transaksidetails)}}"><i class="fa fa-print fa-lg"></i></a>
                                        <br><br>
                                        <a class="btn btn-dark text-white"><i class="fas fa-barcode"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		function tampil_detailTransaksi (id_transaksidetails) {
			$.ajax({
				method : 'post',
				url : '{{url('tampil_detailTransaksi_admin')}}',
				data : {
					'_token' : '{{ csrf_token() }}',
					'id_transaksidetails' : id_transaksidetails
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
		function cetak_riwayat_Transaksi (id_transaksidetails) {
			var token = '{{ csrf_token() }}';
		    var my_url = "{{url('/cetak_riwayat_Transaksi')}}";
		    var formData = {
		          '_token': token,
		          'id_transaksidetails': id_transaksidetails
		      };
			$.ajax({
				method : 'POST',
				url : my_url,
				data : formData,
				success:function (resp){
					console.log(resp);
				},
				error:function (resp){
					swal({
						  title: "Peringatan",
						  text: "Gagal mencetak riwayat transaksi!!!",
						  icon: "warning",
						});
					console.log(resp);
				}
			});
		}
	function laporkan(pengiriman_id){
      var token = '{{ csrf_token() }}';
      var my_url = "{{url('/laporkan_nomor_tidak_valid')}}";
      var formData = {
          '_token': token,
          'pengiriman_id': pengiriman_id
      };
      $.ajax({
          method: 'POST',
          url: my_url,
          data: formData,
          success: function(resp){
              $('#refresh_data_laporkan').html(resp);
          },
          error: function (resp){
              console.log(resp);
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
		        	<h5 class="modal-title" id="judul">Detail Transaksi</h5>
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
