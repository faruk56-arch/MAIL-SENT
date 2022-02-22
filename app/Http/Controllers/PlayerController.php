<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    function index()
    {

        return  view('player', ['email' => Auth::user()->email]);
    }
}
