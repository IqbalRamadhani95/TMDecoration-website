<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use App\Models\produk_pesanan;
use Illuminate\Http\Request;

class pemasukan_adm_controller extends Controller
{
    
    public function index()
    {
        $data = [
            'pemasukan' => pemasukan::all(),
            'produkPesanan' => produk_pesanan::join('produk', 'produk.id', '=' , 'produk_pesanan.id_produk')
                ->select('produk_pesanan.*', 'produk_pesanan.jumlah_produk as jml_produk' , 'produk.*')
                ->get()
        ];
        // dd($data);
        return view('admin.pemasukan', $data);
    }

    public function cetakPemasukan(){
        $data = [
            'pemasukan' => pemasukan::all(),
            'produkPesanan' => produk_pesanan::join('produk', 'produk.id', '=' , 'produk_pesanan.id_produk')
                ->select('produk_pesanan.*', 'produk_pesanan.jumlah_produk as jml_produk' , 'produk.*')
                ->get()
        ];

        return view('admin.cetak_pemasukan', $data);
    }

    public function hapusPemasukan(Request $request){
        pemasukan::where('id', $request->id)->delete();
        return redirect('./pemasukan');
    }

    public function cekTanggalPemasukan(Request $request){
        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;

        $data = [
            'pemasukan' => pemasukan::whereDate('tanggal_sewa', '>=', $tanggal_mulai)
            ->whereDate('tanggal_sewa', '<=', $tanggal_selesai)
            ->get(),
            'produkPesanan' => produk_pesanan::join('produk', 'produk.id', '=' , 'produk_pesanan.id_produk')
            ->select('produk_pesanan.*', 'produk_pesanan.jumlah_produk as jml_produk' , 'produk.*')
            ->get()
        ];
        return view('admin.pemasukan', $data);
    }
}
