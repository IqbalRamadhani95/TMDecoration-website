<?php

namespace App\Http\Controllers;
use App\Models\produk;
use Illuminate\Http\Request;

class produk_user_controller extends Controller
{
    public function index($id) {
        $data = produk::where('id', $id)->first();

        if ($data) {
            $data = array('title' => $data->nama_produk,
                        'data' => $data);
            return view('user.detail_produk', $data);            
        } else {
            // kalo produk ga ada, jadinya tampil halaman tidak ditemukan (error 404)
            return abort('404');
        }
    }
}
