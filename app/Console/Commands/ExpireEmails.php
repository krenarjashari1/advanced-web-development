<?php

namespace App\Console\Commands;

use App\Jobs\DeleteNotifyEmail;
use App\Jobs\SendMail;
use App\Models\GymMembership;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Auth;

class ExpireEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    protected function schedule(Schedule $schedule){

        $expiredate=GymMembership::all()->get('expireDate');
        $todayDate=Carbon::now()->format('Y-m-d');

        if ($todayDate==$expiredate){

            $user=Auth::user()->email;
            SendMail::dispatch($user,'Membership Expired')->delay(now()->addSeconds(2));

        }

        $schedule->job(new SendMail('email','Membership Expired'));

    }


    public function handle()
    {

        return 0;
    }
}
