<?php

namespace App\Http\Controllers;

use App\Models\GymMembership;
use Illuminate\Http\Request;

class ViewAllGymMembers extends Controller
{
    public function viewAllGymMembers(){


        return view('viewAllGymMembers');
    }
}
