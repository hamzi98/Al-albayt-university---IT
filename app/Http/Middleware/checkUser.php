<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class checkUser
{

    public function handle(Request $request, Closure $next)
    {
        $user=Auth::User()->accept;
        if($user==1)
        return redirect()->back()->with('alert', 'لايمكن (الانضمام او انشاء فريق) لقد قمت بتقديم طلب مسبقاَ');
        elseif($user==2)
        return redirect()->back()->with('alert', 'لايمكن (الانضمام او انشاء فريق) انت عضو في فريق');
        elseif($user==3)
        return redirect()->back()->with('alert', 'لايمكن (الانضمام او انشاء فريق) (أنت مدير فريق)');
        else
         return $next($request);
    }
}
