<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class data_adm_controller extends Controller
{
    public function index()
    {
        $data = [
            'admin' => Admin::all(),
        ];
        return view('admin.data_admin', $data);
    }

    public function cariNamaAdmin(Request $request){
        $data = [
            'admin' => Admin::when($request->name, function ($query) use ($request){
                return $query->where('name', 'like', '%'.$request->name.'%');
            })->get()
        ];

        return view('admin.data_admin', $data);
    }
   
    public function insertAdmin(Request $request) {
        $this->validate($request, [
            'name'     => 'required',
            'username'   => 'required',
            'email'   => 'required',
            'password' => 'required'
        ]);

        $admins = Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if($admins){
            return redirect('./data-admin');
        } else {
            return redirect('./data-admin');
        }
    }

    public function updateAdmin(Request $request) {
        Admin::where('id', $request->id_admin)->get();

        Admin::where('id', $request->id)->update([
            'name'     => $request->name,
            'username'   => $request->username,
            'email'   => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('./data-admin');
    }

    public function deleteAdmin(Request $request) {
        Admin::where('id', $request->id)->delete();
        return redirect('./data-admin');
    }
}
