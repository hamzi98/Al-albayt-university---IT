<?php

namespace App\Models;
use App\Models\post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'body',
        'post_id',
        'user_id',

    ];
    

    
    public function user(){

        return $this->belongsTo(User::class);
    }

    
}
