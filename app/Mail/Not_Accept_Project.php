<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Not_Accept_Project extends Mailable
{
    use Queueable, SerializesModels;


    
    public $info;
    public function __construct($info)
    {
        $this->info=$info;
    }

    public function build()
    {
        return $this->subject('هـــام ')->view('email.NotAcceptProject');
    }


    
}
