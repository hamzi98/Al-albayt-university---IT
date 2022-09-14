<?php

namespace App\Http\Middleware;

use App\Models\skills;
use App\Models\SkillsUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class complete_info_user
{
   
    public function handle(Request $request, Closure $next)
    {
      
        $skills=SkillsUser::select('skills_id')->where('user_id',Auth::id())->first();
        if (empty(Auth::user()->phone) || empty(Auth::user()->image)|| empty(Auth::user()->dep) || empty($skills) ) 
        return redirect('/student/welcome');
        else
        return $next($request);
    }
}
