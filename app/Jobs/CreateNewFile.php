<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateNewFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $filePath;


    public function __construct($filePath)
    {
        $this->filePath=$filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dummyText="Dummy Text for Job Queue. Current Date Time: ".Carbon::now()->toString();
        file_put_contents($this->filePath, $dummyText);
    }
}

