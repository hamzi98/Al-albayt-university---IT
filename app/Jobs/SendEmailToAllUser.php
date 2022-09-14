<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ToAllUser;

class SendEmailToAllUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
      $this->data=$data;
    }

    
    public function handle()
    {
        $user=User::all();
        foreach($user as $users){
        $item = [
            "name"=>$users->name,
            "subject"=>$this->data['subject'],
            "body"=>$this->data['body'],
        ];
        Mail::to($users->email)->send(new ToAllUser ($item));
    }
}
}
