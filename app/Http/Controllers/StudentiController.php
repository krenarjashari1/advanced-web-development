<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentiController extends Controller
{

    public function studenti(){
        $studenti = new \App\Models\Studenti("3","Ee","rrr","hhrhr");


        return view('studenti',[

            "studenti"=>$studenti
        ]);

    }

}
