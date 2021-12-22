<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;


class UserActivity
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
        if (Auth::check()) {
            $expireTime = Carbon::now()->addMinutes(2); // keep online for 1 min
            Cache::put('is_online'.Auth::user()->id, true, $expireTime);
        }
        return $next($request);
    }
}