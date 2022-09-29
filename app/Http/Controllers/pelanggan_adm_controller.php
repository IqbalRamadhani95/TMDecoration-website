<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class pelanggan_adm_controller extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all(),
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)->get()
        ];

        return view('admin.pelanggan_admin', $data);
    }
    
    //insert users
    public function insert_users(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'username'   => 'required',
            'email'   => 'required',
            'password' => 'required'
        ]);

        // //upload image
        // $gambar = $request->file('gambar');
        // $gambar->storeAs('public/images', $gambar->hashName());

        $users = User::create([
            'name'     => $request->name,
            'username'   => $request->username,
            'email'   => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($users) {
            //redirect dengan pesan sukses
            return redirect()->route('rute_users_adm')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('rute_users_adm')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    //delete users
    public function delete(Request $request)
    {
        User::where('id', $request->id)->delete();
        return redirect()->route('rute_users_adm');
    }

    //edit users
    public function edit(Request $request){
        User::where('id', $request->id_users)->get();
    }

    //ubah users
    public function update(Request $request){

        User::where('id', $request->id_users)->get();

        User::where('id', $request->id)->update([
            'name'     => $request->name,
            'username'   => $request->username,
            'email'   => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        return redirect()->route('rute_users_adm')->with(['success' => 'Data Berhasil Disimpan!']);

    }
}
