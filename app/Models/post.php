<?php

namespace App\Models;
use App\Models\User;
use App\Models\comment;
use App\Models\like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable=[
        'body', 
        'project_id',
        'user_id',
        'image',

    ];
    public function comment(){
        return $this->hasMany(comment::class);
    }
    public function like(){
        return $this->hasMany(like::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }
   

    

}
