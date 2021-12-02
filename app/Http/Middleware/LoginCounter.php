<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginCounter
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
        if(Auth::guard($guard)->check()){
            $user = Auth::user();
            $now  = Carbon::now();
            $prev = Carbon::parse($user->last_login_at);
            if(is_null($user->last_login_at) or ($prev->diffInMinutes($now, false) >= 5)){
                $user->last_login_at = $now;
                $user->save();
            }
        }
        return $next($request);
    }
}
