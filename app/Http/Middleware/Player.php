<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use routes\web;

class Player
{

    public function handle(Request $request, Closure $next)
    {

        // if (!Auth::check()) {

        //     return redirect()->route('login');
        // }

        // if (Auth::user()->role == 'scout') {
        //     echo "ok";
        //     exit();
        //     return redirect()->route('scout');
        // }
        
        if (Auth::user()->role == 'player') {
            // to know the path: echo $request->path();
            // exit();
            return redirect()->back();
        }
        abort(403, 'Unauthorized action.');
    }
}


// Route::getRoutes()->match($request);


//To check echo "Player";
            // exit();
