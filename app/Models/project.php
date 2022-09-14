<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'type',
        'dr',
        'des',
        'forr',
        'FrontEnd',
        'BackEnd',
        'Documentation',
        'DataBase',
        'user_fun',
        'lang',
        'user_id',
        'accept',
    ];


    public function std()
    {
        return $this->hasMany(User::class);
    }
    
    public function Project_Admin()
    {
        return $this->hasOne(User::class,'MyProject');
    }

    public function post()
    {
        return $this->hasMany(post::class,'project_id');
    }
    

    





    



    }

