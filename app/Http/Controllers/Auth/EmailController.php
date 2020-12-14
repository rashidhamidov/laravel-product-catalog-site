<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
class EmailController extends Controller
{
    public function forgotEmail(){

    return view('auth.forgot_email');
}

    public function forgot_mail_send(Request $request){
        $data=$request->input();
        Mail::send("auth.forgot_mail_icerik",["data"=>$data
                        ],function ($message){
           $message->to("resid.hemidov.2014@gmail.com","Rashid Hamidov")->subject("Şifre ve Mail yebileme");
        });

    return view('auth.forgot_email')->with('success','Talebiniz alınmıştır. En kısa sürede size geri dönüş sağlanacaktır.');
}


}
