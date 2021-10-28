<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class TransaksiController extends Controller
{   
    public function transaksi () {
        $barang = DB::table('troli')
                    ->join('daftar_produk', 'daftar_produk.id', '=', 'troli.id_produk')
                    ->select(
                                'daftar_produk.nama_produk',
                                'daftar_produk.harga_satuan',
                                'daftar_produk.kategori',
                                'troli.id_produk',
                                'troli.jumlah',
                                'troli.jumlah_harga'
                                )
                    ->where('troli.user_id', Auth::user()->id)
                    ->get();
        
        $wilayah_negara = DB::table('wilayah_negara')->select('*')->get();
        $wilayah_provinsi = DB::table('wilayah_provinsi')->select('*')->get();
        $wilayah_kabupaten = DB::table('wilayah_kabupaten')
                    ->select('idwilayah_kabupaten','nama_kabupaten')
                    ->orderby('nama_kabupaten')
                    ->get();
        $data = [
                'barang' => $barang,
                'wilayah_negara' => $wilayah_negara,
                'wilayah_provinsi' => $wilayah_provinsi,
                'wilayah_kabupaten' => $wilayah_kabupaten
               ];
        return view('Transaction.transaction', $data);
    }
    public function lanjutTransaksi (Request $save) {
        $user_id = Auth::user()->id;

        // Memanggil data di troli dan daftar produk sesuai data dari user login
        $Produkbarang = DB::table('troli')
                        ->join('daftar_produk', 'daftar_produk.id', '=', 'troli.id_produk')
                        ->select('*')
                        ->where('troli.user_id', '=', $user_id)
                        ->get();

        foreach ($Produkbarang as $barang) {
            
        
        $harga_satuan = $barang->harga_satuan;
        $jumlah = $barang->jumlah;
        $jumlah_harga = $barang->jumlah_harga;
        $produk_id = $barang->id_produk;

        // Input data ke tabel transaksi
        $inputData = 
        [
            'user_id' => $user_id,
            'produk_id' => $produk_id,
            'harga_satuan' => $harga_satuan,
            'jumlah' => $jumlah,
            'jumlah_harga' => $jumlah_harga,
        ]; 

        DB::table('transaksi')
            ->insert($inputData);

        // Update Stok barang terjual
        $stok = $barang->stok-$jumlah;
        $updateData = 
        [
            'stok' => $stok
        ]; 

        DB::table('daftar_produk')
            ->where('ID', $produk_id)
            ->update($updateData);

        // Menghapus data di troli yang telah dibayar
        DB::table('troli')
            ->where('user_id', $user_id)
            ->delete();
        }

        // Input data ke transaksi detail
        $nama = $save->nama;
        $email = $save->email;
        $no_hp = $save->no_hp;
        $alamat = $save->alamat;
        $jumlah_pembayaran = $save->jumlah_pembayaran;
        $uang = $save->uang;
        $kembalian = $save->kembalian;
        $metode_pembayaran = $save->metode_pembayaran;

        $inputDetailTransaction =
        [   
            'user_id' => $user_id,
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'nomor_hp' => $no_hp,
            'jumlah_pembayaran' => $jumlah_pembayaran,
            'uang' => $uang,
            'kembalian' => $kembalian,
            'metode_pembayaran' => $metode_pembayaran
        ];
        DB::table('transaksi_detail')
            ->insert($inputDetailTransaction);
    }
    public function detailTransaksi () {
        $user_id = Auth::user()->id;
        $id_produk = DB::table('transaksi')->select('produk_id')->where('user_id', $user_id)->get();
        $detail = DB::table('transaksi')
                        ->leftJoin('transaksi_detail', 'transaksi.user_id', 'transaksi_detail.user_id')
                        ->leftJoin('daftar_produk', 'transaksi.produk_id', 'daftar_produk.id')
                        ->select(
                                    'daftar_produk.id',
                                    'daftar_produk.nama_produk',
                                    'daftar_produk.harga_satuan',
                                    'transaksi_detail.user_id',
                                    'transaksi_detail.nama',
                                    'transaksi_detail.email',
                                    'transaksi_detail.nomor_hp',
                                    'transaksi_detail.alamat',
                                    'transaksi_detail.jumlah_pembayaran',
                                    'transaksi_detail.metode_pembayaran',
                                    'transaksi_detail.uang',
                                    'transaksi_detail.kembalian',
                                    'transaksi.user_id',
                                    'transaksi.jumlah',
                                    'transaksi.jumlah_harga'

                                )
                        ->where('transaksi.user_id', $user_id)
                        ->where('transaksi_detail.user_id', $user_id)
                        ->where('daftar_produk.id', $id_produk)
                        ->get();

        return view('Transaction.detail_transaction', compact('detail'));
    }
    #read wilayah
    public function read_wilayah_negara()
    {
        $wilayah_negara = DB::table('wilayah_negara')->select('*')->get();
        return response()->json($wilayah_negara, 200);
    }

    public function read_wilayah_provinsi(Request $request)
    {
        $negara_id = $request->wilayah_negara;
        $wilayah_provinsi = DB::table('wilayah_provinsi')->select('*')->where('negara_id', $negara_id)->get();
        return response()->json($wilayah_provinsi, 200);
    }

    public function read_wilayah_kabupaten(Request $request)
    {
        $provinsi_id = $request->wilayah_provinsi;
        $wilayah_kabupaten = DB::table('wilayah_kabupaten')->select('*')->where('provinsi_id', $provinsi_id)->get();
        return response()->json($wilayah_kabupaten, 200);
    }

    public function read_wilayah_kecamatan(Request $request)
    {
        $kabupaten_id = $request->wilayah_kabupaten;
        $wilayah_kecamatan = DB::table('wilayah_kecamatan')->select('*')->where('kabupaten_id', $kabupaten_id)->get();
        return response()->json($wilayah_kecamatan, 200);
    }

    public function read_wilayah_kelurahan(Request $request)
    {
        $kecamatan_id = $request->wilayah_kecamatan;
        $wilayah_kelurahan = DB::table('wilayah_kelurahan')->select('*')->where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($wilayah_kelurahan, 200);
    }
}
