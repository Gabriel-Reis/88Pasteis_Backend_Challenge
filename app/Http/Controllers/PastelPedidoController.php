<?php

namespace App\Http\Controllers;

use App\Models\Pastel_pedido;
use App\Models\Pedido;
use App\Models\Pastel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PastelPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pastel_pedido::create([
            'quantidade' => 1,
            'pastel_id' => $request->pastel_id,
            'pedido_id' => $request->pedido_id,
        ]);
        //edita total do pedido
        $pedido = Pedido::find($request->pedido_id);
        $pastel = Pastel::find($request->pastel_id);
        $pedido->total = $pedido->total+$pastel->preco_unit;
        $pedido->save();
        return redirect()->route('pastel_pedido.edit',$request->pedido_id)->with('success', "Pedido editado com sucesso");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pastel_pedido  $pastel_pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pastel_pedido $pastel_pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pastel_pedido  $pastel_pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pastel_pedido $pastel_pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pastel_pedido  $pastel_pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pastel_pedido $pastel_pedido)
    {
        //atualiza quantidade
        $pastel_pedido = Pastel_pedido::find($request->pastel_pedido_id);
        $pastel_pedido->quantidade = $request->qnt;
        $pastel_pedido->save();
        Log::info("Quantidade pastel_pedido atualizado");
        
        //atualiza total pedido
        $sum = 0;
        $pastel_pedido_todos = Pastel_pedido::where('pedido_id',$request->pedido_id)->get(); //recupera todos os pastel_pedido relacionados ao pedido
        foreach ($pastel_pedido_todos as $p){
            $unit = Pastel::find($p->pastel_id)->preco_unit;
            $sum += $unit*$p->quantidade;
        }
        $pedido = Pedido::find($request->pedido_id);
        $pedido->total = $sum;
        $pedido->save();
        Log::info("Preco total atualizado");
        return redirect()->route('pedidos.edit',$request->pedido_id)->with('success', "Pedido editado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pastel_pedido  $pastel_pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pastel_pedido $pastel_pedido)
    {
        //
    }
}
