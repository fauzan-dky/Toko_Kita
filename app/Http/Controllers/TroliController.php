<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\TroliModel;

class TroliController extends Controller
{
    public function openTroli () {
        $listProduct = DB::table('daftar_produk')
            ->select('*')
            ->get();
    	$iduser = Auth::user()->id;
        $TroliList = 
            DB::table('troli')
                ->join('daftar_produk', 'troli.id_produk', '=', 'daftar_produk.id')
                ->select(
                        'daftar_produk.nama_produk',
                        'daftar_produk.harga_satuan',
                        'daftar_produk.kategori',
                        'troli.id_keranjang',
                        'troli.jumlah',
                        'troli.jumlah_harga',
                        'troli.status'
                    )
                ->where('troli.user_id', '=', $iduser)
                ->where('troli.status', 0)
                ->orderby('daftar_produk.nama_produk', 'asc')//Mengurutkan nama sesuai abjad
                ->get();

    	return view('Troli.troli', compact('TroliList', 'listProduct'));
    }
    public function addCart ($idProduct) {
        $list = DB::table('daftar_produk')
            ->select('*')
            ->where('id', '=', $idProduct)
            ->first();
        return view('Troli.add_cart', compact('list'));
    }
    public function saveToCart (Request $save) {
        //cek produk sudah ada dikeranjang atau belum(sesuai user yang login)
        $idUser = $save->user_id;
        $id_produk = $save->id_produk;
        $cekBarang = TroliModel::where('id_produk', $id_produk)->where('user_id', $idUser)->first();
        
        //jika barang belum ada maka akan input barang tersebut ke keranjang
        if (empty($cekBarang)) 
            {
                $user_id = $save->user_id;
                $id_produk = $save->id_produk;
                $harga_satuan = $save->harga_satuan;
                $jumlah = $save->jumlah;
                $jumlah_harga = $jumlah*$harga_satuan;
                
                $inputData = 
                [
                    'user_id' => $user_id,
                    'id_produk' => $id_produk,
                    'harga_satuan' => $harga_satuan,
                    'jumlah' => $jumlah,
                    'jumlah_harga' => $jumlah_harga,
                ]; 

                DB::table('troli')
                    ->insert($inputData);
        }
        //jika barang sudah ada maka hanya menambah jumlahnya saja dan update jumlah harga
        else {
            $id_produk = $cekBarang->id_produk;
            $troli = DB::table('troli')->select('*')->where('id_produk', $id_produk)->first();

            $user_id = $save->user_id;
            $harga_satuan = $save->harga_satuan;
            $jumlah = $save->jumlah+$troli->jumlah;
            $jumlah_harga = $jumlah*$harga_satuan;

            $inputData = 
            [   
                'jumlah' => $jumlah,
                'jumlah_harga' => $jumlah_harga,
            ]; 

            DB::table('troli')
                ->where('id_produk', $id_produk)
                ->update($inputData);
        }
        
    }
    public function deleteFromCart (Request $delete) {
        $id_keranjang = $delete->id_keranjang;
        DB::table('troli')
            ->where('id_keranjang', $id_keranjang)
            ->delete();
    }
    public function deleteAll () {
        DB::table('troli')
            ->select('*')
            ->delete();
        return redirect(url('/troli'));
    }
    public function detailCart (Request $detail) {

        $id_keranjang = $detail->id_keranjang;
        $detailCart = 
            DB::table('troli')
                ->join('daftar_produk', 'troli.id_produk', '=', 'daftar_produk.id')
                ->select(
                        'daftar_produk.nama_produk',
                        'daftar_produk.harga_satuan',
                        'daftar_produk.kategori',
                        'troli.jumlah',
                        'troli.jumlah_harga'
                    )
            ->where('troli.id_keranjang', '=', $id_keranjang)
            ->first();
        return view('Troli.detail_cart', compact('detailCart'));
    }
}
