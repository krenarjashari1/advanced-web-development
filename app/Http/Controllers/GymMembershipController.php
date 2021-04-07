<?php

namespace App\Http\Controllers;

use App\Models\GymMembership;
use App\Models\OldStudenti;
use App\Models\Student;
use Illuminate\Http\Request;

class GymMembershipController extends Controller
{
    public function gymMember(){
        $gymMember = new GymMembership("2", "<b>Filane2 Fisteku</b>",
            "18.10.1900", "F");

        return view('gymMembership', [
            "gymMember" => $gymMember
        ]);
    }

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



    public function addProfilePicture(Request $request, $id){
        $student = Student::find($id);

        if(!$student){
            return abort(404);
        }

        $profilePicture = $request->file('profile_picture');
        $path = null;

        if($profilePicture != null){
            $path = $profilePicture->store('public/images');
            $path = str_replace("public/", 'storage/', $path);
        }

        $student->profile_picture=$path;
        $student->save();
        return redirect(route('show.student', $id));
    }

}
