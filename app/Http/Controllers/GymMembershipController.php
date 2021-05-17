<?php

namespace App\Http\Controllers;

use App\Console\Commands\ExpireEmails;
use App\Jobs\CreateNewFile;
use App\Jobs\DeleteNotifyEmail;
use App\Jobs\SendMail;
use App\Models\GymMembership;
use App\Models\OldStudenti;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class GymMembershipController extends Controller


{



    public function createNewGymMember(Request $request)
    {

        $newMember = new GymMembership();
        $newMember->first_name = $request->first_name;
        $newMember->last_name = $request->last_name;
        $newMember->birthdate = $request->birthdate;
        $newMember->expireDate = $request->expireDate;


        $newMember->profile_picture = $request->profile_picture;
        $newMember->save();

//        Artisan::call(ExpireEmails);


//
//        $expiredate=$newMember->getExpireDate();
//
//        $todayDate=Carbon::now()->format('Y-m-d');
//
//        if ($todayDate==$expiredate){
//
//            $user=Auth::user()->email;
//            SendMail::dispatch($user,'Membership Expired')->delay(now()->addSeconds(2));
//
//        }


        return redirect()->route('viewGymMembers');
    }




    public function deleteGymMember($id)
    {

        $gymMembers = GymMembership::find($id);
        $gymMembers->delete();

        $user=Auth::user()->email;
        DeleteNotifyEmail::dispatch($user,'Membership Canceled');


        return redirect()->route('viewGymMembers');


    }




    public function editGymMembers()
    {
        echo "test";
    }

    public function startQueue($delayMinute){

        CreateNewFile::dispatch(storage_path('/example_'.rand(0,10000).'.txt'))
        ->delay(now()->addMinutes($delayMinute));


    }

    public function sendEmail($delaySeconds){

        SendMail::dispatch("test@email.com", "Tung!")

        ->delay(now()->addSeconds($delaySeconds))->onQueue('emails');

    }








}
