<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class register_Controller extends Controller
{
    // public function index() {
    //     $data = [
    //         'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
    //         ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
    //         ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
    //         ->get()
    //     ];
    //     return view('user.register_user', $data);
    // }

    // public function store(Request $request) {
    //     $request->validate([
    //         'nama_pelanggan' => 'required|max:255',
    //         'username_pelanggan' => 'required|min:4',
    //         'password' => 'required_with:konfirmasi_password|same:konfirmasi_password|min:6',
    //         'konfirmasi_password' => 'min:6'
    //     ]);

    //     $pelanggan = new user([
    //         'id' => $request->id,
    //         'nama_pelanggan' => $request->nama_pelanggan,
    //         'no_telp_pelanggan' => $request->no_telp_pelanggan,
    //         'username_pelanggan' => $request->username_pelanggan,
    //         'password_pelanggan' => $request->password
    //     ]);

    //     $pelanggan->save();
    //     return redirect('/login-user')->with('success', 'registrasi berhasil,');
    // }
}


 