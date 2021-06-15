@extends('layouts.app')

@section('content')

@php 
    if (session()->has('cart')) 
        $cart = session()->get('cart');      
@endphp
{{--  <div class="card text-center">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      <div class="card-footer text-muted">
        2 days ago
      </div>
    </div> --}}
{{-- <div class="mask-container">
<div class="mask"></div>
 --}}
<div class="row row-cols-1 row-cols-md-6 g-4 mt-4">

    @foreach($pasteis as $key => $value)
        <div class="col">
            <div class="card h-100 text-center">
                <div id="title" class="card-header">{{ $value->titulo }}</div>
                
                <img id="img" src="{{ $value->foto }}" class="card-img-top embed-responsive-item" alt="...">
                <div class="card-body">
                    <p id="desc" class="card-text">{{ $value->descricao }}</p>
                </div>
                <div id="price" class="card-footer text-muted">
                    R$ {{ $value->preco_unit }}
                    <hr>
                    <div class="quantity buttons_added"> 
                        
                        @php //Recupera quantidade de pasteis X do carrinho
                            if(session()->has('cart') && array_search($value->id, array_column($cart, 'id')) !== false)
                                $qnt = $cart[array_search($value->id, array_column($cart, 'id'))]['qnt'];
                            else
                                $qnt = 0;
                        @endphp

                        <input type="button" value="-" class="minus cart_edit_minus"><input type="number" id="qnt" step="1" min="0" max="" name="quantity" value="{{$qnt}}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus cart_edit_plus">
                        <input id="ID" type="hidden" value="{{$value->id}}">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection