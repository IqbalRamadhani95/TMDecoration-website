<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login_adm_controller extends Controller
{
    public function index(){
        return view('admin.login', [
            'title' => 'login admin'
        ]);
    }
}