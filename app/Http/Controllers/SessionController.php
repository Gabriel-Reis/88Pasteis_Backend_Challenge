<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        //CSRF token disabled in middleware for createsession
    }

    public function createsession(Request $request)
    {
        // var_dump($request);
        \Session::forget('cart');
        \Session::put('cart', $request->all());
        // echo "session created";
    }
    public function getsession()
    {
        return(session()->get('cart'));
        // return "teste";
    }
}
