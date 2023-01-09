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
        ];

        return view('admin.pelanggan_admin', $data);
    }
    
    public function cariNamaPelanggan(Request $request){
          $data = [
            'users' => User::when($request->name, function ($query) use ($request){
                return $query->where('name', 'like', '%'.$request->name.'%');
            })->get()
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
