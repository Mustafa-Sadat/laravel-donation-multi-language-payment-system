<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(!Auth::check()){
            return redirect()->route('login');
        }
        
        if(Auth::user()->role=="admin"){
            return redirect()->route("admin");
        }
        
        if(Auth::user()->role=="user"){
            return $next($request);
        }

    }

    public function roles()
    {
        return $this->belongsToMany(Supported::class);
    }
}
