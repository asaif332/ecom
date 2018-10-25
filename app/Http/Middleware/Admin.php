<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Auth :: user()->role->name != 'admin') {
        return redirect()->back()->with('error' , 'You must be an admin to access this page');
      }
        return $next($request);
    }
}
