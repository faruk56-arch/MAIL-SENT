<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;
    public function redirectTo()
    {
        switch (Auth::user()->role) {
            case 'admin':
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;
            case 'player':
                $this->redirectTo = '/player';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
    }
}
