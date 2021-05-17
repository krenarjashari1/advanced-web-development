<?php

namespace App\Jobs;

use http\Env\Request;
use http\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $to;
    private $content;




    public function __construct( string $to, string  $content)
    {
        $this->to=$to;
        $this->content=$content;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      Mail::send([],[],function (\Illuminate\Mail\Message $message){
          $message->to($this->to);
          $message->setBody($this->content);
          $message->subject("Fivestar Family");
      });

    }



}

