<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    
    public function handle(Request $request, Closure $next,$guard = null)
    {
        switch ($guard) {
            case 'admin':
              if (Auth::guard($guard)->check()) {
                return redirect('/');
              }
             
            default:
              if (Auth::guard($guard)->check()) {
                  return redirect('/');
              }
              break;
          }
          return $next($request);
          
    }
}