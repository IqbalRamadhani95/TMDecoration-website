<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfilUser_Controller extends Controller
{
    public function index()
    {
        $data = [
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
            ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)
            ->select('keranjang.*','keranjang.jumlah_produk as jml_keranjang','produk.*')
            ->get()
        ];
        return view('user.profil_user', $data);
    }

    public function editProfil(Request $request)
    {
        // User::where('id', $request->id_users)->get();

        User::where('id', Auth::user()->id)->update([
            'name'     => $request->name,
            'username'   => $request->username,
            'email'   => $request->email,
            'alamat' => $request->alamat,
            'noHp' => $request->noHp,
        ]);
            
        return redirect()->route('rute_profil_user')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }
}
