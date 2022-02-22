<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;

class TestController extends Controller
{
    /** * * @param \Illuminate\Http\Request $request */ public function send(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $ouath = $request->get('oauth');
        $body = json_decode($request->getContent(), true);
        // return response()->json([
        // 'message' => json_encode($body)
        // ]);
        foreach ($body as $key => $value) {

            if ($key == 'name') {
                $name = $value;
            }
            if ($key == 'email') {
                $email = $value;
            }
            if ($key == 'password') {
                $password = $value;
            }
            if ($key == 'oauth') {
                $ouath = $value;
            }
        }
        Mail::to($email)->send(new TestMail($name, $email, $password, $ouath));
        return response()->json([
            'message' => 'ok',
        ]);



        // return response()->json(['name' => $name, 'email' => $email, 'password' => $password, 'ouath' => $ouath]);
    }
}
