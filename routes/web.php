<?php

use App\Http\Controllers\login_adm_controller;
use App\Http\Controllers\login_user_controller;
use App\Http\Controllers\produk_controller;
use App\Http\Controllers\produk_user_controller;
use App\Http\Controllers\register_Controller;
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
// BAGIAN ADMIN
Route::get('/login', [login_adm_controller::class, 'index']); 

Route::get('/home', function () {
    return view('admin.home_admin');
});

// Route::get('/produk-adm', function () {
//     return view('admin.produk_admin');
// });

Route::get('/produk-adm', [produk_controller::class, 'index'])->name('rute_produk_adm');

//route insert admin
Route::post('/produk/insert', [produk_controller::class, 'insert_produk'])->name('rute_insert_produk');

//route edit admin
Route::get('/produk-adm/{id}/edit', [produk_controller::class, 'edit'])->name('rute_edit_produk');

//route update admin
Route::put('/produk-adm/{id}', [produk_controller::class, 'update'])->name('rute_update_produk');

//route delete produk admin
Route::post('/produk-adm/delete', [produk_controller::class, 'delete'])->name('rute_delete_produk');


// BAGIAN USER
//login user
Route::get('/login-user',[login_user_controller::class, 'index']);
Route::post('/login-user', [login_user_controller::class, 'login_action']);

//register user
Route::get('/register', [register_Controller::class, 'index']);
Route::post('/register', [register_Controller::class, 'store'])->name('register_user');

Route::get('/', function () {
    return view('user.home');
});

Route::get('/produk', [produk_controller::class, 'indexUser'])->name('rute_daftar_produk');

// Route::get('/produk', function () {
//     return view('user.daftar_produk');
// });

// Route::get('/produk', [produk_controller::class, 'index']);

//menu contact
Route::get('/contact', function () {
    return view('user.contact');
});

//menu cara pesan
Route::get('/cara_pesan', function () {
    return view('user.cara_pesan');
});

//halaman detail produk
Route::get('/detail_produk/{id}', [produk_user_controller::class, 'index'])->name('rute_detail_produk');

// Route::get('/detail_produk', function () {
//     return view('user.detail_produk');
// });