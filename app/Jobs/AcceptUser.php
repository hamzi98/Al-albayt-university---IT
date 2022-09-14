<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\accept;
use Carbon\Carbon;

class AcceptUser implements ShouldQueue
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
            "job"=>$this->data['job'],
            "title"=>$this->data['title'],
            "date"=>$this->data['date'],
            "email"=>$this->data['email'],
              ];
        
        Mail::to($this->data['email'])->send(new accept($info));

    }
}
