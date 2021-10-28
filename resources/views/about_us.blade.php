@extends('layouts/sidenav')
@section('toko_kita')
	<div class="container" style="padding: 10px;">
		<div class="card bg-light">
			<h1 class="card-tittle text-center">Tentang Kami</h1>
			<div class="card-body">
				<h3>Detail Toko</h3>
				<table class="table table-bordered">
					<tr>
						<th style="width: 150px;">Lokasi</th>
						<td>Jl. Jend. Sudirman Gerdu, Giripurwo, Kec. Wonogiri, Kab. Wonogiri, Jawa Tengah 57612</td>
					</tr>
					<tr>
						<th style="width: 150px;">Tahun Berdiri</th>
						<td>Toko Kita didirikan pada tanggal 15 Maret 2021 oleh Fauzan Dicky Ghazika</td>
					</tr>
					<tr>
						<th style="width: 150px;">Pemilik</th>
						<td>Fauzan Dicky Ghazika</td>
					</tr>
					<tr>
						<th style="width: 150px;">Moto</th>
						<td>Menjamin mutu dan kualitas terbaik agar pelanggan puas terhadap produk kami</td>
					</tr>
					<tr>
						<th style="width: 150px;">Deskripsi</th>
						<td>Toko Kita berdiri pada Maret 2021 ini didirikan oleh Fauzan Dicky Ghazika. Awal mula tujuan didirkannya Toko Kita adalah untuk memenuhi kebutuhan masyarakat mengenai kebutuhan sandang, pangan dan papan. Selain tujuan di atas,Toko Kita juga berupaya memebrikan kualitas yang terbaik dengan harga terjangkau bagi pelanggan agar di masa pandemi ini kebutuhan tetap terpenuhi tanpa ada kendala ekonomi</td>
					</tr>
				</table>
				<h3>Produk Yang Di Jual</h3>
				<table class="table table-bordered">
					<tr>
						<th>Makanan dan Bahan Makanan</th>
						<td>Untuk melihat detail produk silahkan klik link berikut ini
							<a href="{{url('/list_food_product')}}" class="btn btn-info btn-sm">Lihat Produk</a>
						</td>
					</tr>
					<tr>
						<th>Alat-Alat Elektronik</th>
						<td>Untuk melihat detail produk silahkan klik link berikut ini
							<a href="{{url('/list_electronic_product')}}" class="btn btn-info btn-sm">Lihat Produk</a>
						</td>
					</tr>
					<tr>
						<th>Alat Tulis Kantor</th>
						<td>Untuk melihat detail produk silahkan klik link berikut ini
							<a href="{{url('/list_stationery_product')}}" class="btn btn-info btn-sm">Lihat Produk</a>
						</td>
					</tr>
				</table>
				<h3>Kontak Toko Kita</h3>
				<table class="table table-bordered">
					<tr>
						<th>Whatsapp</th>
						<td>0857-8106-3419/<a href="https://wa.me/6285781063419">Whatsapp Toko Kita</a></td>
					</tr>
					<tr>
						<th>Instagram</th>
						<td>@toko-kita_wng/<a href="https://www.instagram.com/toko-kita_wng">Instagram Toko Kita</a></td>
					</tr>
					<tr>
						<th>Facebook</th>
						<td>Toko Kita/<a href="https://www.facebook.com/Toko_KIta">Facebook Toko Kita</a></td>
					</tr>
					<tr>
						<th>Nomor Telephone</th>
						<td>(0273)1290 7932</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
@endsection