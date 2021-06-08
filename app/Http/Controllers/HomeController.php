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
        //Inicial
        session()->put('cart', [
            [   'id' => 1,
                'qnt' => 2,
                'href' => '/images/pasteis/queijo.jpg',
                'price' => '8',
                'title' => 'Pastel de queijo',
            ],
            [ 
                'id' => 2,
                'qnt' => 1,
                'href' => '/images/pasteis/calabresa.jpg',
                'price' => '7',
                'title' => 'Pastel de calabresa',
            ],
        ]);

        // //Inserir item
        // $cart = session()->get('cart');
        // //verificar se item existe
        // $key = array_search('Pastel de queijo', array_column($cart, 'title'));
        // if($key !== false){
        //     $cart[$key]['qnt']++;
        // }
        // else{
        //     //add item novo
        //     array_push($cart,[
        //         'id' => 3,
        //         'qnt' => 1,
        //         'href' => '/images/pasteis/carne.jpg',
        //         'price' => '7',
        //         'title' => 'Pastel de carne'
        //     ]);
        // }

        // //Remover item
        // $key = array_search('Pastel de calabresa', array_column($cart, 'title'));
        // if($key !== false)
        //     unset($cart[$key]);

        // //Aplica alterações
        // session()->put('cart', $cart);

        $pasteis = DB::table('pasteis')->get();
        $bebidas = Bebida::all();
        return view('welcome')->with('pasteis', $pasteis)->with('bebidas', $bebidas);
    }
}
