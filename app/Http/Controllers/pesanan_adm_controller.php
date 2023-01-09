<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use App\Models\pesanan;
use App\Models\produk_pesanan;
use Illuminate\Http\Request;

class pesanan_adm_controller extends Controller
{
    public function index()
    {
        $data = [
            'pesanan' => pesanan::join('users', 'users.id', '=' , 'pesanan.id_pelanggan')->select('pesanan.*' , 'users.*')
            ->latest('pesanan.created_at')
            ->paginate(3),
            'produkPesanan' => produk_pesanan::join('produk', 'produk.id', '=' , 'produk_pesanan.id_produk')
                ->join('pesanan', 'pesanan.id_pesanan', '=' , 'produk_pesanan.id_pesanan')
                ->select('produk_pesanan.*', 'produk_pesanan.jumlah_produk as jml_produk' , 'produk.*')
                ->get()
        ];
        // dd($data);
        return view('admin.daftar_pesanan', $data);
    }

    public function cariNama(Request $request){
        $data = [
            'pesanan' => pesanan::join('users', 'users.id', '=' , 'pesanan.id_pelanggan')->select('pesanan.*' , 'users.*')
            ->when($request->cek_nama, function ($query) use ($request){
              return $query->where('nama_pelanggan', 'like', '%'.$request->cek_nama.'%');  
            })
            ->paginate(3),
            'produkPesanan' => produk_pesanan::join('produk', 'produk.id', '=' , 'produk_pesanan.id_produk')
                ->join('pesanan', 'pesanan.id_pesanan', '=' , 'produk_pesanan.id_pesanan')
                ->select('produk_pesanan.*', 'produk_pesanan.jumlah_produk as jml_produk' , 'produk.*')
                ->get()
        ];

        return view('admin.daftar_pesanan', $data);
    }

    public function ubahStatus(Request $request){
        pesanan::where('id_pesanan', $request->id_pesanan)->update([
            'status'     => $request->status_pesanan
        ]);

        return redirect('/daftar-pesanan');
    }

    public function ubahStatusBayar(Request $request){
        pesanan::where('id_pesanan', $request->id_pesanan)->update([
            'status_bayar'     => $request->status_bayar
        ]);

        return redirect('/daftar-pesanan');
    }

    public function hapusPesanan(Request $request){
        pesanan::where('id_pesanan', $request->id_pesanan)->delete();
        produk_pesanan::where('id_pesanan', $request->id_pesanan)->delete();
        return redirect('./daftar-pesanan');
    }

    public function pemasukan(Request $request){
        pemasukan::create([
            'id_pesanan' => $request->id_pesanan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alamat_sewa' => $request->alamat_sewa,
            'harga' => $request->harga
        ]);

        return redirect('/daftar-pesanan');
    }

    public function cekTanggalPesanan(Request $request){
        $tanggal_mulai = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_selesai;

        $data = [
            'pesanan' => pesanan::join('users', 'users.id', '=' , 'pesanan.id_pelanggan')
                ->select('pesanan.*' , 'users.*')
                ->whereDate('tanggal_sewa', '>=', $tanggal_mulai)
                ->whereDate('tanggal_sewa', '<=', $tanggal_selesai)
                ->paginate(3),
            'produkPesanan' => produk_pesanan::join('produk', 'produk.id', '=' , 'produk_pesanan.id_produk')
                ->join('pesanan', 'pesanan.id_pesanan', '=' , 'produk_pesanan.id_pesanan')
                ->select('produk_pesanan.*', 'produk_pesanan.jumlah_produk as jml_produk' , 'produk.*')
                ->get()
        ];
        return view('admin.daftar_pesanan', $data);
    }
}
