<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\pesanan;
use App\Models\produk;
use App\Models\produk_pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class pesanan_user_controller extends Controller
{
    public function caraPesan(){
        $data = [
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
                ->get()
        ];
        return view('user.cara_pesan', $data);
    }

    public function indexPesanan() {
        $data = [
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
                ->get(),
            'pesanan' => pesanan::where('id_pelanggan', Auth::user()->id)->get(),
            'produkPesanan' => produk_pesanan::join('produk', 'produk.id', '=', 'produk_pesanan.id_produk')
                ->join('pesanan', 'pesanan.id_pesanan', '=', 'produk_pesanan.id_pesanan')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('produk_pesanan.*', 'produk_pesanan.jumlah_produk as jml_produk_pesanan' , 'produk.*')
                ->get()
        ];
        // dd($data);
        return view('user.pesanan_user', $data);
    }

    // public function cek_checkout()

    public function tambahPesananDirect(Request $request){
        $status = "Belum diproses";
        $status_bayar = 0;
        $pesanan = pesanan::create([
            'id_pelanggan' => Auth::user()->id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'noHp' => $request->noHp,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_selesai' => $request->tanggal_selesai,
            'id_invoice' => $request->id_invoice,
            'total_harga'   => $request->total_harga,
            'alamat_pelanggan'   => $request->alamat,
            'status' => $status,
            'status_bayar' => $status_bayar
        ]);
        produk_pesanan::create([
            'id_pesanan' => $pesanan->id,
            'id_produk' => $request->id_produk,
            'nama_item' => $request->nama_item,
            'jumlah_produk' => $request->jumlah_produk,
            'tgl_sewa' => $request->tanggal_sewa
        ]);

        if ($pesanan) {
            return redirect('./pesanan');
        } else {
            return redirect('./pesanan');
        }
    }

    public function tambahPesanan(Request $request) {

        $produk_pesanan = keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
            ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
            ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
            ->get();

        $status = "Belum diproses";
        $status_bayar = 0;
        $pesanan = pesanan::create([
            'id_pelanggan' => Auth::user()->id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'noHp' => $request->noHp,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_selesai' => $request->tanggal_selesai,
            'id_invoice' => $request->id_invoice,
            'total_harga'   => $request->total_harga,
            'alamat_pelanggan'   => $request->alamat,
            'status' => $status,
            'status_bayar' => $status_bayar
        ]);

        foreach($produk_pesanan as $pp){
            produk_pesanan::create([
                'id_pesanan' => $pesanan->id,
                'id_produk' => $pp->id_produk,
                'nama_item' => $pp->nama_produk,
                'jumlah_produk' => $pp->jml_keranjang,
                'tgl_sewa' => $request->tanggal_sewa
            ]);
        }

        keranjang::where('id_pelanggan', Auth::user()->id)->delete();

        if ($pesanan) {
            return redirect('./pesanan');
        } else {
            return redirect('./pesanan');
        }
    }

    public function uploadBukti(Request $request){
        
        $bukti_tf = $request->file('bukti_transfer');
        $bukti_tf->storeAs('public/images', $bukti_tf->hashName());

        pesanan::where('id_pesanan', $request->id_pesanan)->update([
            'bukti_transfer'     => $bukti_tf->hashName()
        ]);
            
        return redirect('/pesanan')->with('pesan', 'Upload Bukti Pembayaran Berhasil');

    }

    public function batalPesanan(Request $request){
        pesanan::where('id_pesanan', $request->id)->delete();
        return redirect('./pesanan');
    }

    public function cetakStruk(Request $request) {
        $data = [
            'pesanan' => pesanan::where('id_pesanan', $request->id)->first(),
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
            ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
            ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
            ->get(),
            'produkPesanan' => produk_pesanan::join('produk', 'produk.id', '=', 'produk_pesanan.id_produk')
                ->join('pesanan', 'pesanan.id_pesanan', '=', 'produk_pesanan.id_pesanan')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('produk_pesanan.*', 'produk_pesanan.jumlah_produk as jml_produk_pesanan' , 'produk.*')
                ->get()
        ];
        // dd($data);
        return view('user.cetakStruk', $data);
    }

    public function pembayaran(Request $request){
        $data = [
           'pesanan' => pesanan::where('id_pesanan', $request->id)->first(),
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
            ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
            ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
            ->get(),
            'produkPesanan' => produk_pesanan::join('produk', 'produk.id', '=', 'produk_pesanan.id_produk')
                ->join('pesanan', 'pesanan.id_pesanan', '=', 'produk_pesanan.id_pesanan')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
                ->select('produk_pesanan.*', 'produk_pesanan.jumlah_produk as jml_produk_pesanan' , 'produk.*')
                ->get()
        ];

        return view('user.pembayaran', $data);
    }
}
