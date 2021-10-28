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
										<a class="btn btn-secondary btn-sm text-white"  data-bs-toggle="modal" data-bs-target="#modal{{$details->id_transaksi}}"><i class="fas fa-eye"></i></a>
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
@endsection
<!-- Modal Detail-->
@foreach($detail as $details)
<div class="modal fade" id="modal{{$details->id_transaksi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
		    <div class="modal-content">
		      	<div class="modal-header bg-info text-white">
		        	<h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
		        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      	</div>
			      	<div class="modal-body">
			      	<table class="table table-dark">
			      		<thead>
			      			<tr>
				      			<th>Nama Produk</th>
				      			<th>Harga Satuan</th>
				      			<th>Jumlah</th>
			      			</tr>
			      		</thead>
			      		<tbody>
			      			<tr>
			      				<td>{{$details->nama_produk}}</td>
			      				<td>{{$details->harga_satuan}}</td>
			      				<td>{{$details->jumlah}}</td>
			      			</tr>
			      		</tbody>
			      	</table>
					<table class="table table-borderless mt-3">
						<tr>
							<th>Tanggal</th>
							<td>: {{$details->created_at}}</td>
						</tr>
						<tr>
							<th>Nama</th>
							<td>: {{$details->nama}}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>: {{$details->email}}</td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td>: {{$details->alamat}}</td>
						</tr>
						<tr>
							<th>Nomor Handphone</th>
							<td>: {{$details->nomor_hp}}</td>
						</tr>
						<tr>
							<th>Jumlah Pembayaran</th>
							<td>: Rp {{number_format($details->jumlah_pembayaran,2,',','.')}}</td>
						</tr>
						<tr>
							<th>Ongkos Pengiriman</th>
							<td>: Rp 10.000,00</td>
						</tr>
						<tr>
							<th>Uang Dibayarkan</th>
							<td>: Rp {{number_format($details->uang,2,',','.')}}</td>
						</tr>
						<tr>
							<th>Kembalian</th>
							<td>: Rp {{number_format($details->kembalian,2,',','.')}}</td>
						</tr>
						<tr>
							<th>Metode Pembayaran</th>
							<td>: {{$details->metode_pembayaran}}</td>
						</tr>
					</table>
			      	</div>
	      		<div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-info text-white" onclick="window.print()"><i class="fas fa-print fa-lg"></i> Print</button>
	      </div>
	    </div>
  	</div>
</div>
@endforeach