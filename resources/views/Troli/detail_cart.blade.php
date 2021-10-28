<table class="table table-borderless">
	<tr>
		<th>Nama Produk</th>
		<td>:	{{$detailCart->nama_produk}}</td>
	</tr>
	<tr>
		<th>Harga Satuan</th>
		<td>:	Rp {{number_format($detailCart->harga_satuan,2,',','.')}}</td>
	</tr>
	<tr>
		<th>Kategori</th>
		<td>:	{{$detailCart->kategori}}</td>
	</tr>
	<tr>
		<th>Banyak</th>
		<td>:	{{$detailCart->jumlah}}</td>
	</tr>
	<tr>
		<th>Jumlah Harga</th>
		<td>:	Rp {{number_format($detailCart->jumlah_harga,2,',','.')}}</td>
	</tr>
</table>