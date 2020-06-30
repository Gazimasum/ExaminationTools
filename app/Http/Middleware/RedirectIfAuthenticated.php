<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      switch ($guard) {
       case 'writer':
       if (Auth::guard($guard)->check()) {
           return redirect('writer.index');
       }

         break;

         case 'admin':
         if (Auth::guard($guard)->check()) {
             return redirect('admin.index');
         }

           break;

       case 'web':
       if (Auth::guard($guard)->check()) {
           return redirect('index');
       }

         break;

     }

     return $next($request);
    }
}
