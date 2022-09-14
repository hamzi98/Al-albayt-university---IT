<?php

namespace App\Models;
use App\Models\post;
use App\Models\project;
use App\Models\comment;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use ProtoneMedia\LaravelVerifyNewEmail\MustVerifyNewEmail;
use Laravel\Sanctum\HasApiTokens;
use App\Jobs\QueuedVerifyEmailJob;

class User extends Authenticatable implements MustVerifyEmail

{
    use HasApiTokens, HasFactory, Notifiable  ,MustVerifyNewEmail;

 
/*  TO QUEUES 

public function sendEmailVerificationNotification()
    {
        //dispactches the job to the queue passing it this User object
         QueuedVerifyEmailJob::dispatch($this);
    }*/
    protected $fillable = [
        'name',
        'l_name',
        'phone',
        'id_uni',
        'dep',
        'link_fb',
        'admin',
        'skills'=>'araay',
        'email',
        'password',
        'image',
        'MyProject',
        'job',
        'project_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 
    public function project()
    {
        return $this->hasOne(project::class);
    }


    public function comment()
    {
        return $this->hasMany(comment::class);
    }
    public function posts()
    {
        return $this->hasMany(post::class);
    }

    public function skills()
    {
        return $this->hasMany(SkillsUser::class);
    }






}
