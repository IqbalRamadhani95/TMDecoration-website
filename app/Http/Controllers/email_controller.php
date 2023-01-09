<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class email_controller extends Controller
{
    public function kirimEmail(Request $request) {
        $email = $request->email;
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'saran' => $request->saran
        ];

        Mail::send('user.baseEmail', $data, function ($mail) use ($email){
            $mail->to('tunasmudadecoration@gmail.com', 'no-reply')
                ->subject("Saran Tunas Muda Decoration");
            $mail->from($email, 'Tunas Muda');
        });

        if(Mail::flushMacros()){
            session()->flash('error', 'Email gagal terkirim');
            return redirect('/contact');
        }
        session()->flash('success', 'Sukses terkirim');
        return redirect('/contact');

    }
}
