<?php

namespace App\Http\Controllers;

use App\Models\Pastel_pedido;
use App\Models\Pedido;
use App\Models\Pastel;
use Illuminate\Http\Request;

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
        return redirect()->route('pastel_pedido.edit',$request->pedido_id)->with('success', "Pedido realizado com sucesso");
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
        //
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
