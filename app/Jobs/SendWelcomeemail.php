<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Mail;
class SendWelcomeemail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $user= $this->user;
         //发送邮件
      Mail::send('emails.welcome',['user'=>$user],function($message) use ($user){
          $message->to($user->email);
          $message->subject('Welcome to yourPhplib');
      });
    }
}
