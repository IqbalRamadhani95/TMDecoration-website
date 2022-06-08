<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class produk_controller extends Controller
{
    public function index()
    {
        $data = [
            'produk' => produk::all()
        ];

        return view('admin.produk_admin', $data);
    }

    public function indexUser()
    {
        $data = [
            'produk' => produk::all()
        ];

        return view('user.daftar_produk', $data);
    }

    //insert produk
    public function insert_produk(Request $request)
    {
        $this->validate($request, [
            'gambar'     => 'required|image|mimes:png,jpg,jpeg',
            'nama'     => 'required',
            'deskripsi'   => 'required',
            'jumlah'   => 'required',
            'harga'   => 'required',
        ]);

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/images', $gambar->hashName());

        $produk = produk::create([
            'foto'     => $gambar->hashName(),
            'nama_produk'     => $request->nama,
            'deskripsi'   => $request->deskripsi,
            'jumlah_produk'   => $request->jumlah,
            'harga_sewa'   => $request->harga
        ]);

        if ($produk) {
            //redirect dengan pesan sukses
            return redirect()->route('rute_produk_adm')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('rute_produk_adm')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    //delete produk
    public function delete(Request $request)
    {
        produk::where('id', $request->id)->delete();
        return redirect()->route('rute_produk_adm');
    }

    //edit produk
    public function edit(Request $request){
        produk::where('id', $request->id_produk)->get();
    }

    //ubah produk
    public function update(Request $request){
        //gambar_awal
        $old_file = $request->old_image;
        $file = $request->file('gambar_update');

        if ($file != '') {
            produk::where('id', $request->id)->get();

            $update_gambar = $request->file('gambar_update');
            $update_gambar->storeAs('public/images', $update_gambar->hashName());

            produk::where('id', $request->id)->update([
                'foto'     => $update_gambar->hashName(),
                'nama_produk'     => $request->nama_produk,
                'deskripsi'   => $request->deskripsi_produk,
                'jumlah_produk'   => $request->jumlah_produk,
                'harga_sewa'   => $request->harga_sewa
            ]);
        } else {
            produk::where('id', $request->id_produk)->get();

            produk::where('id', $request->id)->update([
                'nama_produk'     => $request->nama_produk,
                'deskripsi'   => $request->deskripsi_produk,
                'jumlah_produk'   => $request->jumlah_produk,
                'harga_sewa'   => $request->harga_sewa
            ]);
        }

        //upload image
        // $gambar = $request->file('gambar_produk');
        // $gambar->storeAs('public/images', $gambar->hashName());

        // produk::where('id', $request->id)->update([
        //     'foto'     => $gambar->hashName(),
        //     'nama_produk'     => $request->nama_produk,
        //     'deskripsi'   => $request->deskripsi_produk,
        //     'jumlah_produk'   => $request->jumlah_produk,
        //     'harga_sewa'   => $request->harga_sewa
        // ]);
        
        return redirect()->route('rute_produk_adm')->with(['success' => 'Data Berhasil Disimpan!']);

    }
}