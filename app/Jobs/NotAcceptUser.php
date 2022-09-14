<?php

namespace App\Jobs;

use App\Mail\NotAccept;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotAcceptUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data=$data;
    }

   
    public function handle()
    {
        $info=[
            "name"=>$this->data['name'],
            "title"=>$this->data['title'],
            "date"=>$this->data['date'],
            "email"=>$this->data['email'],
              ];
        
        Mail::to($this->data['email'])->send(new NotAccept($info));

    }
}
