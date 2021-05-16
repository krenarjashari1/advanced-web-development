<?php

namespace App\Console\Commands;

use App\Models\GymMembership;
use App\Models\Studenti;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HappyBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'students:happy-birthday{studentId?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Happy Birthday message to students...';

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
    public function handle()
    {



        $now=Carbon::now();
        GymMembership::where('birthdate',$now)->get();
        return 0;
    }
}
