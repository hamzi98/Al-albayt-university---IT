<?php

namespace App\Jobs;

use App\Mail\End;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EndJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   
    public $data;
    public function __construct($data)
    {  
       $this->data=$data;
    }

   
    public function handle()
    {

       foreach ($this->data as $val) {
        Mail::to($val)->send(new End());
            } 
        
        }
}
