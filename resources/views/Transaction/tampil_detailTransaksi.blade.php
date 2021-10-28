                    @foreach($produk as $row)
                    <table id="detail" class="detail" class="table table-dark">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$row->nama_produk}}</td>
                                <td>{{$row->harga_satuan}}</td>
                                <td>{{$row->jumlah}}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                    
                    @foreach($detail as $details)
                    <table id="detail" class="detail" class="table table-borderless mt-3">
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
                    </table>
                    @endforeach