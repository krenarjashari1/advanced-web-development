<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){
        return view('sendmail');
    }


    public function sendMail(){

    }
}
