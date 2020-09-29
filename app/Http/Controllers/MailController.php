<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ExapleMail;
class MailController extends Controller
{
    public function sendmail(){
        $data=[
            'title'=>"xin chao",
            'body'=>"dsadsadsadsadsadsa"
        ];

        Mail::to('ntdat.ptit@gmail.com')->send(new ExapleMail($data));
    }
}
