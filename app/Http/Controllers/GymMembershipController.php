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
