<?php

namespace App\Http\Controllers;

use App\Models\GymMembership;
use App\Models\OldStudenti;
use App\Models\Student;
use Illuminate\Http\Request;

class GymMembershipController extends Controller


{

    public function createNewGymMember(Request $request){

        $newMember = new GymMembership();
        $newMember->first_name = $request->first_name;
        $newMember->last_name = $request->last_name;
        $newMember->birthdate = $request->birthdate;
        $newMember->expireDate = $request->expireDate;


        $newMember->profile_picture=$request->profile_picture;
        $newMember->save();

        return redirect()->route('viewGymMembers');
    }


    public function deleteGymMember($id){

        $gymMembers=GymMembership::find($id);
        $gymMembers->delete();

        return redirect()->route('viewGymMembers');

    }





}
