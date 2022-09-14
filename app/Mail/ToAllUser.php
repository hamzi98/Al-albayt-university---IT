<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ToAllUser extends Mailable
{
    use Queueable, SerializesModels;

    public $item;
    public function __construct($item)
    {
        $this->item=$item;
    }

    public function build()
    {
        return $this->subject('الإدارة')->view('email.AllToUser');
    }
}
