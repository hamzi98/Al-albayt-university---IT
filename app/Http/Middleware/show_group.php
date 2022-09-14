<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class show_group
{

    public function handle(Request $request, Closure $next)
    {
        $user=Auth::User()->accept;
        if($user==2 || $user==3)
        return $next($request);
        else
        abort(403, 'لست عضواً الى الان ');
    

    }
}
