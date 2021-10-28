<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;

class AdminController extends Controller
{
    public function memberList () {
    	$memberList = 
    		DB::table('users')
    			->select('*')
    			->orderby('name', 'asc')
    			->get();

    	return view('Admin.member_list', compact('memberList'));

    }
    public function addMember () {
    	return view('Admin.add_member');
    }
    public function saveMember (Request $save) {
    	$nama = $save->name;
    	$level = $save->level;
    	$email = $save->email;
    	$password = Hash::make($save->password);

    	$input_member =
    	[
    		'name' => $nama,
    		'level' => $level,
    		'email' => $email,
    		'password' => $password
    	];

    	DB::table('users')
    		->insert($input_member);
        $input_member =
        [
            'name' => $nama,
            'email' => $email,
        ];

        DB::table('account')
            ->insert($input_member);

    	return redirect(url('/member_list'))->with('success', 'Pengguna telah ditambahkan!');
    }

    public function editMember ($idMember) {
        $data = DB::table('users')
            ->select('*')
            ->where('id', $idMember)
            ->first();

        return view('Admin.edit_member', compact('data'));
    }
    public function saveEditedMember (Request $save){
    	$nama = $save->name;
    	$level = $save->level;
    	$email = $save->email;
    	$password = Hash::make($save->password);
    	$idMember = $save->id;
    	$editMember =
    	[
    		'name' => $nama,
    		'level' => $level,
    		'email' => $email,
    		'password' => $password
    	];

    	 DB::table('users')
            ->where('id', $idMember)
            ->update($editMember);

        return redirect(url('/member_list'));

    }
    public function deleteMember (Request $delete) {
        $idMember = $delete->id;
        DB::table('users')
            ->where('id', '=', $idMember)
            ->delete();
    }
    public function detailTransaksi () {
        $detail = DB::table('transaksi_detail')
                        ->select('*')
                        ->get();

        return view('Admin.detail_transaction', compact('detail'));
    }
    public function tampil_detailTransaksi (Request $read) {
        $id_transaksidetails = $read->id_transaksidetails;
        $user_id = Auth::user()->id;
        $tgl = DB::table('transaksi_detail')
                    ->select('created_at', 'id_transaksidetails')
                    ->where('id_transaksidetails', $id_transaksidetails)
                    ->get();
        foreach ($tgl as $k) {
            $tgl_transaksi = $k->created_at;
        }
        // dd($tgl_transaksi);
        $produk = DB::table('transaksi')
                        ->leftJoin('daftar_produk', 'transaksi.produk_id', 'daftar_produk.id')
                        ->select(
                                    'daftar_produk.id',
                                    'daftar_produk.nama_produk',
                                    'daftar_produk.harga_satuan',
                                    'transaksi.user_id',
                                    'transaksi.jumlah'
                                    )
                        ->where('transaksi.created_at', $tgl_transaksi)
                        ->get();
        $detail = DB::table('transaksi_detail')
                        ->select(
                                    'user_id',
                                    'nama',
                                    'email',
                                    'nomor_hp',
                                    'alamat',
                                    'jumlah_pembayaran',
                                    'metode_pembayaran',
                                    'uang',
                                    'kembalian',
                                    'created_at',
                                    'id_transaksidetails'

                                )
                        ->where('id_transaksidetails', $id_transaksidetails)
                        ->get();
        $data = [
                    'produk' => $produk,
                    'detail' => $detail
                    ];
        return view('Admin.tampil_detailTransaksi', $data);
    }
    public function cetak_riwayat_Transaksi($id_transaksi)
    {
        $id_transaksidetails = $id_transaksi;
        $user_id = Auth::user()->id;

        $tgl = DB::table('transaksi_detail')
                    ->select('created_at', 'id_transaksidetails')
                    ->where('id_transaksidetails', $id_transaksidetails)
                    ->get();
        foreach ($tgl as $k) {
            $tgl_transaksi = $k->created_at;
        }
        // dd($tgl_transaksi);
        $produk = DB::table('transaksi')
                        ->leftJoin('daftar_produk', 'transaksi.produk_id', 'daftar_produk.id')
                        ->select(
                                    'daftar_produk.id',
                                    'daftar_produk.nama_produk',
                                    'daftar_produk.harga_satuan',
                                    'transaksi.user_id',
                                    'transaksi.jumlah'
                                    )
                        ->where('transaksi.created_at', $tgl_transaksi)
                        ->get();
        $detail = DB::table('transaksi_detail')
                        ->select(
                                    'user_id',
                                    'nama',
                                    'email',
                                    'nomor_hp',
                                    'alamat',
                                    'jumlah_pembayaran',
                                    'metode_pembayaran',
                                    'uang',
                                    'kembalian',
                                    'created_at',
                                    'id_transaksidetails'

                                )
                        ->where('id_transaksidetails', $id_transaksidetails)
                        ->get();
        $data = [
                    'produk' => $produk,
                    'detail' => $detail
                    ];
       return PDF::loadView('Admin.cetak_riwayat_transaksi', $data)->setPaper('folio', 'portrait')->stream('cetak_riwayat_transaksi.pdf');
    }
}
