<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pastel;
use App\Models\Bebida;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $pasteisSalgados = DB::table('pasteis')->where('salgado', '1')->get();
        $pasteisDoces = DB::table('pasteis')->where('salgado', '0')->get();
        $bebidas = Bebida::all();
        return view('welcome')->with('pasteisSalgados', $pasteisSalgados)->with('pasteisDoces', $pasteisDoces)->with('bebidas', $bebidas);
    }
}
