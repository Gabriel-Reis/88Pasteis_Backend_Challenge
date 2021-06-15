<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pastel;
use DB;

class CarrinhoController extends Controller
{
    function __construct()
    {
        // $this->middleware('auth'); //remover
    }

    public function index()
    {
        $pasteis = DB::table('pasteis')->get();
        return view('sections.carrinho.index')->with('pasteis', $pasteis); 
        // $request->session()->put('cart', [
        //     [   'id' => 1,
        //         'qnt' => 2
        //     ],
        //     [ 
        //         'id' => 2,
        //         'qnt' => 1
        //     ],
        // ])
    }

    public function show(Request $request, $id)
    {
    // $cart = $request->session()->get('cart', 'default');
 
    // Recupera o carrinho de compras da sessão:
    // $cart = $request->session()->get('cart');
 
    // Outra alternativa é recuperar um valor default, caso não exista a sessão, veja:
    // $cart = $request->session()->get('cart', []);
    // Caso não exista a sessão 'cart' a variável $cart vai iniciar com um array vazio
 
 
    // Recuperar e deletar a sessão
    // $cart = $request->session()->pull('cart', []);
 
    // É possível também recuperar todas as sessões
    // dd($request->session()->all());
    }

//public function show(Request $request, $id)
//{
    // $request->session()->forget('key');
 
    // Deletando uma sessão específica:
    //$request->session()->forget('cart');
 
    // Deletando todas as sessões:
    //$request->session()->flush();
//}

    // public function show(Request $request, $id)
    // {
        // Verifica se existe a sessão
        // if ($request->session()->has('cart')) {
            // dd($request->session()->get('cart'));
        // }
     
        // Verificar se existe o item na sessão
        // if ($request->session()->exists('products')) {
            // dd($request->session()->get('cart'));
        // }
    // }

}
