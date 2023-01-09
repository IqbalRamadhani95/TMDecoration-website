<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class produk_user_controller extends Controller
{
    public function index(){
        $data = [
            'product' => produk::all(),
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
            ->where('id_pelanggan', Auth::check() ? Auth::user()->id : null)
            ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
            ->get()
        ];
        // dd($data);
        return view('user.daftar_produk', $data);
    }

    public function detailProdukAwal(Request $request)
    {
        $data = [
            'produk'=>produk::where('id', $request->id)->first(),
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
                ->get()
        ];
        // dd($data);
        return view('user.detail_produk_awal', $data);

    }

    public function detailProduk(Request $request)
    {
        $data = [
            'produk'=>produk::where('id', $request->id)->first(),
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
                ->get()
        ];
        // dd($data);
        return view('user.detail_produk', $data);

    }
}
