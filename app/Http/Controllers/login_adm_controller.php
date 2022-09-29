<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\keranjang;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class login_adm_controller extends Controller
{
    public function index(){
        $data = [
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan', Auth::check() ? Auth::user()->id : null)->get()
        ];
        return view('admin.login', $data);
    }

    public function home(){
        $data = [
            'keranjang'=>keranjang::join('produk', 'produk.id', '=' , 'keranjang.id_produk')
                ->where('id_pelanggan',  Auth::check() ? Auth::user()->id : null)->get()
        ];
        return view('admin.home_admin', $data);
    }

    public function login(Request $request){
        $check = $request->all();

        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
            return redirect()->route('admin.home')->with('error', 'admin berhasil login');
        }else{
           return back()->with('error', 'invalid email or password');
        }
    }

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error', 'logout berhasil');
    }

    public function AdminRegister() {
        return view('admin.register_admin');
    }

    public function AdminRegisterCreate(Request $request){

        Admin::insert([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('login_form')->with('error', 'register berhasil silahkan login');
    }
}
