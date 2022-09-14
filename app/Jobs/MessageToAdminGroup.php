<?php

namespace App\Jobs;

use App\Mail\JoinAdmin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\JoinUser;

class MessageToAdminGroup implements ShouldQueue
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
        //User
        "name"=>$this->data['name'],
        "l_name"=>$this->data['l_name'],
        "dep"=>$this->data['dep'],
        "job"=>$this->data['job'],
        "email"=>$this->data['email'],
        "date"=>$this->data['date'],
        
        //Admin
        "admin_Fname"=>$this->data['admin_Fname'],
        "admin_Lname"=>$this->data['admin_Lname'],
        "admin_job"=>$this->data['admin_job'],
        "admin_dep"=>$this->data['admin_dep'],
        "admin_email"=>$this->data['admin_email'],

        //project
        "title"=>$this->data['title'],
        "type"=>$this->data['type'],
        "dr"=>$this->data['dr'],
        "des"=>$this->data['des'],
        "lang"=>$this->data['lang'],

         ];
        

    Mail::to($this->data['email'])->send(new JoinUser($info));
    Mail::to($this->data['admin_email'])->send(new JoinAdmin($info));

    }
}
