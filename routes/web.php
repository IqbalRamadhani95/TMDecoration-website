<?php

use App\Http\Controllers\checkout_controller;
use App\Http\Controllers\daftar_pesanan_adm_controller;
use App\Http\Controllers\data_adm_controller;
use App\Http\Controllers\email_controller;
use App\Http\Controllers\home_controller;
use App\Http\Controllers\keranjang_controller;
use App\Http\Controllers\kontak_controller;
use App\Http\Controllers\laporan_sewa_adm_controller;
use App\Http\Controllers\login_adm_controller;
use App\Http\Controllers\login_user_controller;
use App\Http\Controllers\pelanggan_adm_controller;
use App\Http\Controllers\pemasukan_adm_controller;
use App\Http\Controllers\pengeluaran_adm_controller;
use App\Http\Controllers\pesanan_adm_controller;
use App\Http\Controllers\pesanan_user_controller;
use App\Http\Controllers\PesananUser_Controller;
use App\Http\Controllers\produk_controller;
use App\Http\Controllers\produk_user_controller;
use App\Http\Controllers\ProfilUser_Controller;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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
//laravel breeze
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// -------------------- ROUTE UNTUK ADMIN ---------------------
// Route::prefix('admin')->group(function (){
// });
//rute login
Route::get('/login-adm' ,[login_adm_controller::class, 'index'])->name('login_form');
Route::post('/login/owner' ,[login_adm_controller::class, 'login'])->name('admin.login');
Route::get('/home' ,[login_adm_controller::class, 'home'])->name('admin.home')->middleware('admin');
Route::get('/logout-adm' ,[login_adm_controller::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
Route::get('/register-adm' ,[login_adm_controller::class, 'AdminRegister'])->name('admin.register');
Route::post('/register-adm/create' ,[login_adm_controller::class, 'AdminRegisterCreate'])->name('admin.register.create');


//crud produk
Route::get('/produk-adm', [produk_controller::class, 'index'])->name('rute_produk_adm')->middleware('admin');
Route::post('/produk-adm/insert', [produk_controller::class, 'insert_produk'])->name('rute_insert_produk')->middleware('admin');
Route::get('/produk-adm/{id}/edit', [produk_controller::class, 'edit'])->name('rute_edit_produk')->middleware('admin');
Route::put('/produk-adm/{id}', [produk_controller::class, 'update'])->name('rute_update_produk')->middleware('admin');
Route::post('/produk-adm/delete', [produk_controller::class, 'delete'])->name('rute_delete_produk')->middleware('admin');
Route::put('/ubah-status-produk', [produk_controller::class, 'ubahStatusProduk'])->middleware('admin');
Route::get('produk-adm/cariProduk', [produk_controller::class, 'cariNamaProduk']);

//crud data user
Route::get('/users-adm', [pelanggan_adm_controller::class, 'index'])->name('rute_users_adm')->middleware('admin');
Route::post('/users/insert', [pelanggan_adm_controller::class, 'insert_users'])->name('rute_insert_users')->middleware('admin');
Route::put('/users-adm/{id}', [pelanggan_adm_controller::class, 'update'])->name('rute_update_users')->middleware('admin');
Route::post('/users-adm/delete', [pelanggan_adm_controller::class, 'delete'])->name('rute_delete_users')->middleware('admin');
Route::get('/users/cariNama', [pelanggan_adm_controller::class, 'cariNamaPelanggan'])->middleware('admin');

//crud data admin
Route::get('/data-admin', [data_adm_controller::class, 'index'])->name('rute_admin')->middleware('admin');
Route::post('/data-admin/insert', [data_adm_controller::class, 'insertAdmin'])->middleware('admin');
Route::put('/data-admin/{id}', [data_adm_controller::class, 'updateAdmin'])->middleware('admin');
Route::post('/data-admin/delete', [data_adm_controller::class, 'deleteAdmin'])->middleware('admin');
Route::get('/data-admin/cariNama', [data_adm_controller::class, 'cariNamaAdmin']);

//crud laporan pengeluaran
Route::get('/pengeluaran', [pengeluaran_adm_controller::class, 'index'])->middleware('admin');
Route::post('/pengeluaran/insert', [pengeluaran_adm_controller::class, 'tambahPengeluaran'])->middleware('admin');
Route::put('/pengeluaran/{id}', [pengeluaran_adm_controller::class, 'editPengeluaran'])->middleware('admin');
Route::post('/pengeluaran/delete', [pengeluaran_adm_controller::class, 'hapusPengeluaran'])->middleware('admin');
Route::get('/cetak-pengeluaran', [pengeluaran_adm_controller::class, 'cetakPengeluaran'])->middleware('admin');
Route::get('/pengeluaran/periode', [pengeluaran_adm_controller::class, 'cekTanggal'])->middleware('admin');

//crud daftar pesanan
Route::get('/daftar-pesanan', [pesanan_adm_controller::class, 'index'])->middleware('admin');
Route::put('/ubah-status', [pesanan_adm_controller::class, 'ubahStatus'])->middleware('admin');
Route::get('/pesanan/periode', [pesanan_adm_controller::class, 'cekTanggalPesanan'])->middleware('admin');
Route::get('/pesanan/cekNama', [pesanan_adm_controller::class, 'cariNama'])->middleware('admin');
Route::put('/statusBayar', [pesanan_adm_controller::class, 'ubahStatusBayar'])->middleware('admin');
Route::post('/pesanan/delete', [pesanan_adm_controller::class, 'hapusPesanan'])->middleware('admin');

//crud laporan pemasukan
Route::get('/pemasukan', [pemasukan_adm_controller::class, 'index'])->middleware('admin');
Route::post('/tambah-pemasukan', [pesanan_adm_controller::class, 'pemasukan'])->middleware('admin');
Route::get('/cetak-pemasukan', [pemasukan_adm_controller::class, 'cetakPemasukan'])->middleware('admin');
Route::post('/pemasukan/delete', [pemasukan_adm_controller::class, 'hapusPemasukan'])->middleware('admin');
Route::get('/pemasukan/periode', [pemasukan_adm_controller::class, 'cekTanggalPemasukan'])->middleware('admin');

// -------------------------- RUTE UNTUK USER ---------------------------
// register user
Route::get('/register1', [register_Controller::class, 'index']);
Route::post('/register1', [register_Controller::class, 'store'])->name('register_user');
Route::get('/', [home_controller::class, 'index']);

//daftar produk
Route::get('/produk', [produk_user_controller::class, 'index'])->name('rute_daftar_produk');
Route::get('/detailProdukAwal/{id}', [produk_user_controller::class, 'detailProdukAwal']);
Route::get('/detail_produk/{id}', [produk_user_controller::class, 'detailProduk'])->name('rute_detail_produk');
Route::post('/tambah_keranjang', [keranjang_controller::class, 'tambahKeranjang']);
Route::post('/hapus_keranjang', [keranjang_controller::class, 'hapusKeranjang']);

//menu contact
Route::get('/contact', [kontak_controller::class, 'index']);
Route::post('/kirim-email', [email_controller::class, 'kirimEmail']);

//menu cara pesan
Route::get('/cara_pesan', [PesananUser_Controller::class, 'index']);

//profil pengguna
Route::get('/profil-user', [ProfilUser_Controller::class, 'index'])->name('rute_profil_user');
Route::put('/profil-user/edit', [ProfilUser_Controller::class, 'editProfil'])->name('rute_edit_profil');

//cara pesan
Route::get('/cara_pesan', [pesanan_user_controller::class, 'caraPesan'])->name('rute_cara_pesan');

//checkout
Route::get('/checkout/{id}', [keranjang_controller::class, 'checkout']);
Route::get('/checkout-direct/{id}', [keranjang_controller::class, 'checkoutDirect']);

//cekstok
Route::get('/cekstok/{id}', [keranjang_controller::class, 'cekstok']);
Route::get('/cekproduk', [keranjang_controller::class, 'cek']);

//pesanan 
Route::get('/pesanan', [pesanan_user_controller::class, 'indexPesanan']);
Route::post('/tambah-pesanan', [pesanan_user_controller::class, 'tambahPesanan']);
Route::post('/tambah-pesanan-direct', [pesanan_user_controller::class, 'tambahPesananDirect']);
Route::post('/batal-pesanan', [pesanan_user_controller::class, 'batalPesanan']);
Route::put('/bukti-tf', [pesanan_user_controller::class, 'uploadBukti']);
Route::get('/cetakStruk/{id}', [pesanan_user_controller::class, 'cetakStruk']);
Route::get('/pembayaran/{id}', [pesanan_user_controller::class, 'pembayaran']);




