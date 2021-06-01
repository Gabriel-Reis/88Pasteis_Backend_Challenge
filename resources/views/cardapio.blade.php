@extends('layouts.app')

@section('css')
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
@endsection

@section('content')

    <div class="card text-center">
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
    </div>

<div class="row row-cols-1 row-cols-md-3 g-4 mt-4">

    @foreach($pasteis as $key => $value)
        <div class="col">
            <div class="card h-100  text-center">
                <div class="card-header">
                    {{ $value->titulo }}
                </div>
                <img src="{{ $value->foto }}" class="card-img-top embed-responsive-item" alt="...">
                <div class="card-body">
                    <p class="card-text">{{ $value->descricao }}</p>
                </div>
                <div class="card-footer text-muted">
                    R$ {{ $value->preco_unit }}
                </div>
            </div>
        </div>
    @endforeach

    {{-- exibir outros e bebidas --}}

@endsection