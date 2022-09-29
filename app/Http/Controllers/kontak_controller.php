<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kontak_controller extends Controller
{
    public function index() {
        $data = [
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
            ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)->get()
        ];
        return view('user.contact', $data);
    }
}
