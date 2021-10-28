<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addProduct () {
    	return view('Product.add_product');
    }
    public function saveProduct (Request $save) {
    	$namaProduk = $save->nama_produk;
    	$hargaSatuan = $save->harga_satuan;
    	$stok = $save->stok;
    	$kategori = $save->kategori;
    	$deskripsi = $save->deskripsi;
        $fotoProduk = $save->file('foto_produk');

        //Buat Nama Produk
        $namaFoto = $fotoProduk->getClientOriginalName();
        $extension = $fotoProduk->getClientOriginalExtension();
        $fileFoto = $namaFoto . '.' . $extension;
    	
        //Tujuan upload
        $tujuanUpload = public_path(). '/upload_file/';

        $fotoProduk->move($tujuanUpload, $fileFoto);

        $inputData = 
        [
    		'nama_produk' => $namaProduk,
    		'harga_satuan' => $hargaSatuan,
    		'stok' => $stok,
    		'kategori' => $kategori,
            'foto_produk' => $fileFoto,
            'deskripsi' => $deskripsi
    	]; 

    	DB::table('daftar_produk')
    		->insert($inputData);

    	return redirect(url('/add_product'))->with('success', 'Produk telah ditambahkan!');//ALERT TAMBAH PRODUK
    }
    //Food Action
    public function listFoodProduct () {
    	$listProduct = DB::table('daftar_produk')
    		->select('*')
    		->where('kategori', '=', 'Makanan')
    		->orderby('nama_produk', 'asc')
    		->paginate(6);
    	return view('Product.list_food_product', compact('listProduct'));
    }
    public function deleteProduct1 (Request $delete) {
        $id_produk = $delete->id;
        DB::table('daftar_produk')
            ->where('id', '=', $id_produk)
            ->delete();
        return redirect(url('/list_food_product'))->with('delete', 'Produk telah dihapus!');//ALERT HAPUS PRODUK;
    }
    public function editProduct1 ($idProduct) {
        $list = DB::table('daftar_produk')
            ->select('*')
            ->where('id', '=', $idProduct)
            ->first();
        return view('Product.edit_product_food', compact('list'));
    }
    public function saveEditedProduct1 (Request $save) {
        $namaProduk = $save->nama_produk;
        $hargaSatuan = $save->harga_satuan;
        $stok = $save->stok;
        $kategori = $save->kategori;
        $deskripsi = $save->deskripsi;
        $fotoProduk = $save->file('foto_produk');
        $idProduct = $save->id;

        //Buat Nama Produk
        $namaFoto = $fotoProduk->getClientOriginalName();
        $extension = $fotoProduk->getClientOriginalExtension();
        $fileFoto = $namaFoto . '.' . $extension;
        
        //Tujuan upload
        $tujuanUpload = public_path(). '/upload_file/';

        $fotoProduk->move($tujuanUpload, $fileFoto);

        $editData = 
        [
            'nama_produk' => $namaProduk,
            'harga_satuan' => $hargaSatuan,
            'stok' => $stok,
            'kategori' => $kategori,
            'foto_produk' => $fileFoto,
            'deskripsi' => $deskripsi
        ]; 

        DB::table('daftar_produk')
            ->where('id', '=', $idProduct)
            ->update($editData);

        return redirect(url('/list_food_product'))->with('update', 'Produk telah diubah!');

    }

    //Electronic Action
    public function listElectronicProduct () {
    	$listProduct = DB::table('daftar_produk')
    		->select('*')
    		->where('kategori', '=', 'Elektronik')
    		->orderby('nama_produk', 'asc')
    		->paginate(6);
    	return view('Product.list_electronic_product', compact('listProduct'));
    }
    public function deleteProduct2 (Request $delete) {
        $id_produk = $delete->id;
        DB::table('daftar_produk')
            ->where('id', '=', $id_produk)
            ->delete();
        return redirect(url('/list_electronic_product'))->with('delete', 'Produk telah dihapus!');//ALERT HAPUS PRODUK;
    }
    public function editProduct2 ($idProduct) {
        $list = DB::table('daftar_produk')
            ->select('*')
            ->where('id', '=', $idProduct)
            ->first();
        return view('Product.edit_product_electronic', compact('list'));
    }
    public function saveEditedProduct2 (Request $save) {
        $namaProduk = $save->nama_produk;
        $hargaSatuan = $save->harga_satuan;
        $stok = $save->stok;
        $kategori = $save->kategori;
        $deskripsi = $save->deskripsi;
        $fotoProduk = $save->file('foto_produk');
        $idProduct = $save->id;

        //Buat Nama Produk
        $namaFoto = $fotoProduk->getClientOriginalName();
        $extension = $fotoProduk->getClientOriginalExtension();
        $fileFoto = $namaFoto . '.' . $extension;
        
        //Tujuan upload
        $tujuanUpload = public_path(). '/upload_file/';

        $fotoProduk->move($tujuanUpload, $fileFoto);

        $editData = 
        [
            'nama_produk' => $namaProduk,
            'harga_satuan' => $hargaSatuan,
            'stok' => $stok,
            'kategori' => $kategori,
            'foto_produk' => $fileFoto,
            'deskripsi' => $deskripsi
        ]; 

        DB::table('daftar_produk')
            ->where('id', '=', $idProduct)
            ->update($editData);

        return redirect(url('/list_electronic_product'))->with('update', 'Produk telah diubah!');

    }

    //Stationery Action
    public function listStationeryProduct () {
    	$listProduct = DB::table('daftar_produk')
    		->select('*')
    		->where('kategori','=', 'Alat Tulis')
    		->orderby('nama_produk', 'asc')
    		->paginate(6);
    	return view('Product.list_stationery_product', compact('listProduct'));
    }
    public function deleteProduct3 (Request $delete) {
        $id_produk = $delete->id;
    	DB::table('daftar_produk')
    		->where('id', '=', $id_produk)
    		->delete();
    	return redirect(url('/list_stationery_product'))->with('delete', 'Produk telah dihapus!');//ALERT HAPUS PRODUK;
    }
    public function editProduct3 ($idProduct) {
        $list = DB::table('daftar_produk')
            ->select('*')
            ->where('id', '=', $idProduct)
            ->first();
        return view('Product.edit_product_stationery', compact('list'));
    }
    public function saveEditedProduct3 (Request $save) {
        $namaProduk = $save->nama_produk;
        $hargaSatuan = $save->harga_satuan;
        $stok = $save->stok;
        $kategori = $save->kategori;
        $deskripsi = $save->deskripsi;
        $fotoProduk = $save->file('foto_produk');
        $idProduct = $save->id;

        //Buat Nama Produk
        $namaFoto = $fotoProduk->getClientOriginalName();
        $extension = $fotoProduk->getClientOriginalExtension();
        $fileFoto = $namaFoto . '.' . $extension;
        
        //Tujuan upload
        $tujuanUpload = public_path(). '/upload_file/';

        $fotoProduk->move($tujuanUpload, $fileFoto);

        $editData = 
        [
            'nama_produk' => $namaProduk,
            'harga_satuan' => $hargaSatuan,
            'stok' => $stok,
            'kategori' => $kategori,
            'foto_produk' => $fileFoto,
            'deskripsi' => $deskripsi
        ]; 

        DB::table('daftar_produk')
            ->where('id', '=', $idProduct)
            ->update($editData);

        return redirect(url('/list_stationery_product'))->with('update', 'Produk telah diubah!');

    }
    //Search
    public function search(Request $search) {
        $namaProduct = $search->nama;
        $listProduct = DB::table('daftar_produk')
            ->select('*')
            ->where('nama_produk', 'like', "%".$namaProduct."%")
            ->get();

        return view('Product.list_search', compact('listProduct', 'namaProduct'));
    }
}
