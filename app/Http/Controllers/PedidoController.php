<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Pastel_pedido;
use App\Models\Status_pedido;
use App\Models\Pagamento;
use App\Models\Pastel;
use App\Models\Bebida;
use App\Models\Cupom;
use DB;
use Auth;

class PedidoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pasteis = Pastel::all();
        // $bebidas = Bebida::all();
        // \Log::info("5");
        $pedidos = Pedido::where('user_id', 1)->get();
        $pastel_pedido = Pastel_pedido::all();
        $status_pedido = Status_pedido::all();
        // $cupons = Cupom::all();
        // $pagamentos = Pagamento::all();
        return view('sections.pedido.index')->with('pedidos', $pedidos)->with('pastel_pedido', $pastel_pedido)->with('status_pedido', $status_pedido);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pasteis = DB::table('pasteis')->get();
        $pasteis = Pastel::all();
        $bebidas = Bebida::all();
        $cupons = Cupom::all();
        $pagamentos = Pagamento::all();
        return view('sections.pedido.create')->with('pasteis', $pasteis)->with('bebidas', $bebidas)->with('cupons', $cupons)->with('pagamentos', $pagamentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Recupera carrinho
        if (session()->has('cart') && count(session()->get('cart')) > 0)
            $cart = session()->pull('cart');
        else
            return redirect()->route('home')->with('fail', "Pedido falhou");


        //Armazena Pedido
        if($request->cupom_id == 0)
            $cupom = null;
        else
            $cupom = $request->cupom_id;
        
        $id = Pedido::create([
            'user_id' => $request->user_id,
            'total' => $request->total,
            'status_pedido_id' => $request->status_pedido_id,
            'obs' => $request->obs,
            'cpf' => str_replace(['.','-'],'',$request->cpf),
            'forma_pag_id' => $request->forma_pag_id,
            'cupom_id' => $cupom,
        ])->id;
        

        //Armazena pasteis selecionados
        foreach ($cart as $pastel) {
            Pastel_pedido::create([
                'quantidade' => $pastel['qnt'],
                'pastel_id' => $pastel['id'],
                'pedido_id' => $id,
            ]);
        }

        return redirect()->route('home')->with('success', "Pedido realizado com sucesso");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $pastel_pedido = Pastel_pedido::where('pedido_id', $pedido->id)->get();
        $status_pedido = Status_pedido::all();
        $pasteis = Pastel::all();
        $cupons = Cupom::all();
        return view('sections.pedido.show', ['pedido' => $pedido])->with('pastel_pedido',$pastel_pedido)->with('pasteis',$pasteis)->with('cupons',$cupons);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
