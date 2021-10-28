<?php
	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\AdminController;
	use App\Http\Controllers\ProductController;
	use App\Http\Controllers\TroliController;
	use App\Http\Controllers\TransaksiController;
	use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//verifikasi email user
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


//This Route can be access just by Admin
Route::group(['middleware' => ['auth', 'ceklevel:Admin']], function () {
	
	//List Member
	Route::get('/member_list', 'AdminController@memberList');
	
	//Add and save a new member
	Route::get('/add_member', 'AdminController@addMember');
	Route::post('/save_member', 'AdminController@saveMember');
	
	//Edit and save data member
	Route::get('/edit_member/{id_member}', 'AdminController@editMember');
	Route::post('/save_edited_member', 'AdminController@saveEditedMember');
	
	//Delete a member
	Route::post('/delete_member', 'AdminController@deleteMember');
	
	//Product Act
	Route::get('/add_product', 'ProductController@addProduct');
	Route::post('/save_product', 'ProductController@saveProduct');

		//Delete Product
		Route::post('/delete_food', 'ProductController@deleteProduct1');
		Route::post('/delete_electronic', 'ProductController@deleteProduct2');
		Route::post('/delete_stationery', 'ProductController@deleteProduct3');
		//Edit Product
		Route::get('/edit_product_food/{id_product}', 'ProductController@editProduct1');
		Route::post('/save_edited_product_food', 'ProductController@saveEditedProduct1');

		Route::get('/edit_product_electronic/{id_product}', 'ProductController@editProduct2');
		Route::post('/save_edited_product_electronic', 'ProductController@saveEditedProduct2');

		Route::get('/edit_product_stationery/{id_product}', 'ProductController@editProduct3');
		Route::post('/save_edited_product_stationery', 'ProductController@saveEditedProduct3');

	//Transaction
	Route::get('/transaction_report', 'AdminController@detailTransaksi');
	Route::post('/tampil_detailTransaksi_admin', 'AdminController@tampil_detailTransaksi');
	Route::get('/cetak_riwayat_Transaksi/{id_transaksi}', 'AdminController@cetak_riwayat_Transaksi')->name('cetak_riwayat_Transaksi');
});

//This Route can be access just by Admin and User
Route::group(['middleware' => ['auth', 'ceklevel:Admin,User']], function () {
	Route::get('/about_us','HomeController@aboutUS');

	//List Product
	Route::get('/list_food_product', 'ProductController@listFoodProduct');
	Route::get('/list_electronic_product', 'ProductController@listElectronicProduct');
	Route::get('/list_stationery_product', 'ProductController@listStationeryProduct');

	//Troli
	Route::get('/troli', 'TroliController@openTroli');
	Route::get('/add_cart/{id_product}', 'TroliController@addCart');
	Route::post('/save_to_cart', 'TroliController@saveToCart');
	Route::post('/delete_from_cart', 'TroliController@deleteFromCart');
	Route::post('/delete_all', 'TroliController@deleteAll');
	Route::post('/detail_cart', 'TroliController@detailCart');
	
	//Search
	Route::get('/search', 'ProductController@search');

	//Transaction
	Route::get('/transaksi', 'TransaksiController@transaksi');
	Route::post('/transaksi_pembayaran', 'TransaksiController@lanjutTransaksi');
	Route::get('/detail_transaction', 'TransaksiController@detailTransaksi');
	Route::post('/tampil_detailTransaksi', 'TransaksiController@tampil_detailTransaksi');

	//Profile
	Route::get('/profil', 'AccountController@profil');
	Route::get('/profil_setting', 'AccountController@accountSetting');
	Route::post('/save_account', 'AccountController@saveAccount');
	#region
	Route::post('read_wilayah_provinsi_reg','TransaksiController@read_wilayah_provinsi_reg');
	Route::post('read_wilayah_kabupaten_reg','TransaksiController@read_wilayah_kabupaten_reg');
	Route::post('read_wilayah_kecamatan_reg','TransaksiController@read_wilayah_kecamatan_reg');
	Route::post('read_wilayah_kelurahan_reg','TransaksiController@read_wilayah_kelurahan_reg');

	Route::post('read_wilayah_provinsi_reg_dom','TransaksiController@read_wilayah_provinsi_reg_dom');
	Route::post('read_wilayah_kabupaten_reg_dom','TransaksiController@read_wilayah_kabupaten_reg_dom');
	Route::post('read_wilayah_kecamatan_reg_dom','TransaksiController@read_wilayah_kecamatan_reg_dom');
	Route::post('read_wilayah_kelurahan_reg_dom','TransaksiController@read_wilayah_kelurahan_reg_dom');
	#region
    Route::post('read_wilayah_negara','TransaksiController@read_wilayah_negara');
    Route::post('read_wilayah_provinsi','TransaksiController@read_wilayah_provinsi');
    Route::post('read_wilayah_kabupaten','TransaksiController@read_wilayah_kabupaten');
    Route::post('read_wilayah_kecamatan','TransaksiController@read_wilayah_kecamatan');
    Route::post('read_wilayah_kelurahan','TransaksiController@read_wilayah_kelurahan');
});