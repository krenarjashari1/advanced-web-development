<?php

namespace App\Http\Controllers;

use App\Models\GymMembership;
use App\Models\OldStudenti;
use App\Models\Student;
use Illuminate\Http\Request;

class GymMembershipController extends Controller


{



    public function createNewGymMember(Request $request){

        $profilePicture = $request->file('profile_picture');
        $path = null;

        if($profilePicture != null){
            $path = $profilePicture->store('public/images');
            $path = str_replace("public/", 'storage/', $path);
        }

        $newMember = new GymMembership();
        $newMember->first_name = $request->first_name;
        $newMember->last_name = $request->last_name;
        $newMember->birthdate = $request->birthdate;
        $newMember->expireDate = $request->expireDate;

        $newMember->profile_picture = $path;
        $newMember->is_active = true;

        $newMember->save();

        return redirect()->route('gym.membership');
    }

    public function addNewMember(){
        return view('gymMembership');
    }





    public function addProfilePicture(Request $request, $first_name){
        $newMember = GymMembership::find($first_name);

        if(!$newMember){
            return abort(404);
        }

        $profilePicture = $request->file('profile_picture');
        $path = null;

        if($profilePicture != null){
            $path = $profilePicture->store('public/images');
            $path = str_replace("public/", 'storage/', $path);
        }

        $newMember->profile_picture=$path;
        $newMember->save();
        return redirect(route('show.student', $newMember));
    }

}
