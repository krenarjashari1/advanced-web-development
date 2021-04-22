<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){
        return view('sendmail');
    }


    public function sendMail(Request $request){

        $request->validate([
           'to'=>'required|email',
            'message'=>'required|string'
        ]);

        SendMail::dispatch($request->to,$request->message)
        ->onQueue('emails');

    }
}
