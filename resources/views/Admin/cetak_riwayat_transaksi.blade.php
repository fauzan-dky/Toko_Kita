<!DOCTYPE html>
<html>
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>
        <style type="text/css">
      table {
          border-spacing: 0px;
          border-collapse: collapse;
          font-size: 9pt;
          table-layout: auto;
      }


      table th {
          text-align: center;
          border-width: 1px;
          padding: 5px;
          border-style: solid;
          border-color: black;
          background-color: #66cdaa;
          -moz-border-radius: ;
      }
      table td {
          border-width: 1px;
          padding: 5px;
          border-style: solid;
          border-color: black;
          vertical-align: top;
          -moz-border-radius: ;
      }
      table td.none {
          border-width: 0px;
          padding: 0px;
          border-color: black;
          -moz-border-radius: ;
      }
      table td.under {
          border-width: 1px;
          border-top: 1px;
          border-left: 1px;
          border-right: 1px;
          padding: 0px;
          border-color: black;
          -moz-border-radius: ;
      }
      p {
        margin-top: 3px;
        margin-bottom: 3px;
      }

      .bingkai{
        width:240px;
        height: 260px;
        border:1px solid #ccc;
      }
  </style>
        </head>
<body>
<h1 align="center">Detail Barang</h1>
<table id="detail" class="detail" class="table table-dark table-hover mt-3 text-center">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach($produk as $row)
        <tr>
            <td scope="row">{{$no++}}</td>
            <td align="left">{{$row->nama_produk}}</td>
            <td align="left">{{$row->harga_satuan}}</td>
            <td align="right">{{$row->jumlah}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>
<hr>
<br>
<h1 align="center">Detail Transaksi</h1>
<table id="detail" class="detail" class="table table-borderless mt-3">
    @foreach($detail as $details)
    <tr>
        <th>Tanggal Transaksi</th>
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
    @endforeach
</table>
</body>
</html>