<?php

namespace App\Http\Middleware;


use Closure;
use routes\web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class Admin
{

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == 'admin') {
            return $next($request);
            // return Route::getRoutes()->match($request);
        }
        abort(403);
    }
}

//
//$next($request); //Here find out a way to continue to admin page
