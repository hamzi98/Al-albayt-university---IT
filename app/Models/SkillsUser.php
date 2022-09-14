<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillsUser extends Model
{
    use HasFactory;
    public $fillable=[
        'user_id',
        'skills_id',
    ];
    
    public function skills()
    {
        return $this->belongsTo(skills::class,'skills_id');
    }
    
}
