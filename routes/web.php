<?php

use App\Http\Controllers\home_controller;
use App\Http\Controllers\keranjang_controller;
use App\Http\Controllers\kontak_controller;
use App\Http\Controllers\login_adm_controller;
use App\Http\Controllers\login_user_controller;
use App\Http\Controllers\pelanggan_adm_controller;
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
Route::get('/produk-adm', [produk_controller::class, 'index'])->name('rute_produk_adm');
//route insert admin
Route::post('/produk-adm/insert', [produk_controller::class, 'insert_produk'])->name('rute_insert_produk');
//route edit admin
Route::get('/produk-adm/{id}/edit', [produk_controller::class, 'edit'])->name('rute_edit_produk');
//route update admin
Route::put('/produk-adm/{id}', [produk_controller::class, 'update'])->name('rute_update_produk');
//route delete produk admin
Route::post('/produk-adm/delete', [produk_controller::class, 'delete'])->name('rute_delete_produk');


//crud data user
Route::get('/users-adm', [pelanggan_adm_controller::class, 'index'])->name('rute_users_adm');
//route insert data user oleh admin
Route::post('/users/insert', [pelanggan_adm_controller::class, 'insert_users'])->name('rute_insert_users');
//route edit data user oleh admin
Route::get('/users-adm/{id}/edit', [pelanggan_adm_controller::class, 'edit'])->name('rute_edit_users');
//route update data user oleh admin
Route::put('/users-adm/{id}', [pelanggan_adm_controller::class, 'update'])->name('rute_update_users');
//route delete data user oleh admin
Route::post('/users-adm/delete', [pelanggan_adm_controller::class, 'delete'])->name('rute_delete_users');


// -------------------------- RUTE UNTUK USER ---------------------------
// register user
Route::get('/register1', [register_Controller::class, 'index']);
Route::post('/register1', [register_Controller::class, 'store'])->name('register_user');

Route::get('/', [home_controller::class, 'index'] );

//rute menampilkan data produk
Route::get('/produk', [produk_controller::class, 'indexUser'])->name('rute_daftar_produk');

//halaman detail produk
Route::get('/detail_produk/{id}', [produk_user_controller::class, 'detailProduk'])->name('rute_detail_produk');

Route::post('/tambah_keranjang', [keranjang_controller::class, 'tambahKeranjang']);
Route::post('/hapus_keranjang', [keranjang_controller::class, 'hapusKeranjang']);

//menu contact
Route::get('/contact', [kontak_controller::class, 'index']);

//menu cara pesan
Route::get('/cara_pesan', [PesananUser_Controller::class, 'index']);

//profil pengguna
Route::get('/profil-user', [ProfilUser_Controller::class, 'index'])->name('rute_profil_user');
Route::put('/profil-user/edit', [ProfilUser_Controller::class, 'editProfil'])->name('rute_edit_profil');

//pesanan
Route::get('/pesanan', [pesananUser_controller::class, 'index'])->name('rute_pesanan');

