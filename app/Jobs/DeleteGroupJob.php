<?php

namespace App\Jobs;

use App\Mail\DeleteGroup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\project;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class DeleteGroupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $name;

    public function __construct($data,$name)
    {
        
       $this->data=$data;
       $this->name=$name;

    }

   
    public function handle()
    {
       
        $info=[
          'name'=>$this->name,
          'date'=>Carbon::now(),
        ];

       foreach ($this->data as $val) {
        Mail::to($val)->send(new DeleteGroup($info));
            } 
        
        }
}
