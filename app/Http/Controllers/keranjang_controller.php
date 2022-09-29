<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use Illuminate\Http\Request;

class keranjang_controller extends Controller
{
    public function tambahKeranjang(Request $request)
    {
        $keranjang = keranjang::create([
            'id_pelanggan'     => $request->id_pelanggan,
            'id_produk'   => $request->id_produk,
            'jumlah_produk'   => $request->jumlah_produk,
            'total_harga' => $request->total_harga
        ]);

        if ($keranjang) {
            return redirect('./detail_produk/'. $request->id_produk);
        } else {
            return redirect('./detail_produk/'. $request->id_produk);
        }
        
    }

    public function hapusKeranjang(Request $request)
    {
        keranjang::where('id_keranjang', $request->id_keranjang)->delete();
        return redirect()->route('rute_daftar_produk');
    }
}
