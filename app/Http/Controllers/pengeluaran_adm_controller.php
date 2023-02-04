<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use Illuminate\Http\Request;

class pengeluaran_adm_controller extends Controller
{
    public function index(){
        
        $data = [
            'pengeluaran' => pengeluaran::all()
        ];

        return view('admin.pengeluaran', $data);
    }

    public function cetakPengeluaran(){
        $data = [
            'pengeluaran' => pengeluaran::all()
        ];

        return view('admin.cetak_pengeluaran', $data);
    }

    public function tambahPengeluaran(Request $request){
        $this->validate($request, [
            'nama_item'     => 'required',
            'jumlah_item'  => 'required',
            'tanggal_beli'   => 'required',
            'harga_item' => 'required'
        ]);

        $pengeluaran = pengeluaran::create([
            'nama_item' => $request->nama_item,
            'jumlah_item' => $request->jumlah_item,
            'tanggal_beli' => $request->tanggal_beli,
            'harga_item' => $request->harga_item
        ]);

        if($pengeluaran){
            return redirect('./pengeluaran');
        } else {
            return redirect('./pengeluaran');
        }
    }

    public function editPengeluaran(Request $request){
        pengeluaran::where('id', $request->id)->get();

        pengeluaran::where('id', $request->id)->update([
            'nama_item' => $request->nama_item,
            'jumlah_item' => $request->jumlah_item,
            'tanggal_beli' => $request->tanggal_beli,
            'harga_item' => $request->harga_item
        ]);

        return redirect('./pengeluaran');
    }

    public function hapusPengeluaran(Request $request){
        pengeluaran::where('id', $request->id)->delete();
        return redirect('./pengeluaran');
    }
}
