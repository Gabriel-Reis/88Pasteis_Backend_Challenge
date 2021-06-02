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
        session()->put('cart', [
            [   'id' => 1,
                'qnt' => 2
            ],
            [ 
                'id' => 2,
                'qnt' => 1
            ],
        ]);

        $pasteis = DB::table('pasteis')->get();
        $bebidas = Bebida::all();
        return view('welcome')->with('pasteis', $pasteis)->with('bebidas', $bebidas);
    }
}
