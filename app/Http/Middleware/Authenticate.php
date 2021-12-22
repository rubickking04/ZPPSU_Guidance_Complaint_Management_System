<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->is('admin/*')) {
            if (!Auth::guard('admin')->check()){
                return route('admin.login');
            }
        }
        else if (!Auth::guard('web')->check()){
            Alert::toast('Please Login or Sign Up an account first!', 'info');
            return route('login');
        }
    }
}