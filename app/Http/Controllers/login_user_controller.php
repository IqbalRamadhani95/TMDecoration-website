<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\pelanggan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login_user_controller extends Controller
{
    // public function index(){
    //     $data = [
    //         'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
    //             ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
    //             ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
    //             ->get()
    //     ];
    //     return view('user.login_user', $data);
    // }

    // public function login_action(Request $request){
    //     $request->validate([
    //         'username_pelanggan' => 'required',
    //         'password' => 'required'
    //     ]); 

    //     if(Auth::attempt(['username_pelanggan' => $request->username_pelanggan, 'password' => $request->password])) {
    //        $request->session()->regenerate();
    //        return redirect()->intended('/');
    //     }

    //     return back()->with('loginError', 'login gagal!');
    // }
}
