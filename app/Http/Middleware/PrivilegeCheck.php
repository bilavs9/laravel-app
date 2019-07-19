<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PrivilegeCheck
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
         $privilege = Auth::user()->privilege;
         if($privilege!='super_admin'){
             return redirect()->back();
         }
        return $next($request);
    }
}
