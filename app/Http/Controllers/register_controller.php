<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class register_Controller extends Controller
{
    public function index() {
        return view('user.register_user');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_pelanggan' => 'required|max:255',
            'username_pelanggan' => 'required|min:4',
            'password' => 'required_with:konfirmasi_password|same:konfirmasi_password|min:6',
            'konfirmasi_password' => 'min:6'
        ]);

        $pelanggan = new pelanggan([
            'id' => $request->id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telp_pelanggan' => $request->no_telp_pelanggan,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'username_pelanggan' => $request->username_pelanggan,
            'password_pelanggan' => $request->password
        ]);

        $pelanggan->save();
        return redirect('/login-user')->with('success', 'registrasi berhasil, silahkan login');

        // if($pelanggan){
        //     return redirect('/')->with(['Success' => 'Data telah ditambahkan']);
        // } else {
        //     return redirect('/register')->with(['success' => 'Data gagal ditambahkan']);
        // }
    }
}


 