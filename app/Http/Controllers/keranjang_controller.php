<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\pesanan;
use App\Models\produk;
use App\Models\produk_pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function checkout() {
        $data = [
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
                ->get()
        ];
        // dd($data);
        return view('user.checkout', $data);
    }

    public function checkoutDirect(Request $request) {
        $data = [
            'produk' => produk::where('id', $request->id)->first(),
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
                ->get()
        ];
        // dd($data);
        return view('user.checkout_direct', $data);
    }

    public function cekstok(Request $request){
        $data = [
            'produk' => produk::where('id', $request->id)->first(),
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
                ->get(),
        ];

        return view('user.cek_checkout', $data);
    }

    public function cek(Request $request) {

        $tanggal_mulai = $request->tanggal_sewa;
        $tanggal_selesai = $request->tanggal_selesai;

        $d = [
            'produk' => produk::where('id', $request->id)->first(),
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
                ->get(),
        ];

            $pp = produk_pesanan::where('id_produk', $request->id)
                ->whereDate('tgl_sewa', '>=', $tanggal_mulai)
                ->whereDate('tgl_sewa', '<=', $tanggal_selesai)
                ->get();

        // dd($pp);
        return view('user.cek_checkout', compact('pp'), $d);
        
        // if (sizeof($data) === 0) {
        //     return view('user.detail_produk', $d);
        // } else {
        //     return view('user.cek_checkout', $d);
        // }
        

        // if ($pp->isEmpty()) {
        //     return view('user.detail_produk', $d);
        // } else {
        //     return view('user.cek_checkout', $d);
        // }
        
    }

}
