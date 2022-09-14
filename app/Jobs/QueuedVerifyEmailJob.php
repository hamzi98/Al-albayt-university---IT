<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Models\User;

class QueuedVerifyEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        //the user property passed to the constructor through the job dispatch method
        $this->user = $user;
    }

    public function handle()
    {
        //This queued job sends
        //Illuminate\Auth\Notifications\VerifyEmail verification
        //to the user by triggering the notification
        $this->user->notify(new VerifyEmail);
    }
}
