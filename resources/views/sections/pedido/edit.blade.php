@extends('layouts.app')

@section('content')

	<form>
		<div class="row">
			<div class="col-md-3">
				<label style="font-size:20px">Pastel</label>
			</div>
			<div class="col-md-2">
				<label style="font-size:20px">Quantidade</label>
			</div>
			<div class="col-md-2">
				<label style="font-size:20px">Preço unitário</label>
			</div>
			<div class="col-md-3">
				<label style="font-size:20px">Preço total</label>
			</div>
		</div>
	</form>
	<hr>

	@foreach ($pastel_pedido as $pastel)
		<div>
			<form method="post" action="{{route('pastel_pedido.update', $pedido->id)}}">
				@csrf
				{{ method_field('patch') }}
				<input class="form-control" type='hidden' name='pedido_id' value={{$pedido->id}}>
				<input class="form-control" type='hidden' name='pastel_pedido_id' value={{$pastel->id}} >

				<div id="row" name="row" class="row mb-3 mt-3">
					<div class="col-md-3">
						<label style="font-size:20px">{{$pasteis[$pastel->pastel_id-1]['titulo']}}</label>
					</div>

					<div class="col-md-2">
						<div class="quantity buttons_added"> 
							<input type="button" value="-" class="order_edit_minus minus"><input type="number" step="1" min="0" max="" name="qnt" value="{{$pastel->quantidade}}" title="Qty" class="input-text qty qnt text" size="4" pattern="" inputmode=""><input type="button" value="+" class="order_edit_plus plus">
						</div>
					</div>

					<div class="col-md-2">
						<input type="text" class="form-control unit_value"  name="unit" value="R$ {{ number_format($pasteis[$pastel->pastel_id-1]['preco_unit'],2) }}">
					</div>

					<div class="col-md-2">
						<input type="text" class="form-control price_total" name="price" value="R$ {{ number_format($pasteis[$pastel->pastel_id-1]['preco_unit']*$pastel->quantidade,2) }}">
					</div>

					<div class="col-md-3">
						<div class="form-group row container">
							<button type="submit" class="btn btn-success">Atualizar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	@endforeach
	<hr>

	<form>
		<div class="row">
			<div class="col-md-3">
				<label style="font-size:20px">Total</label>
			</div>
			<div class="col-md-6">
				<label style="font-size:20px"></label>
			</div>
			<div class="col-md-3">
				<label class="total" id="total" style="font-size:20px; align:left">R$ {{$pedido->total}}</label>
			</div>
		</div>
	</form>

	<hr>

	<form>
		<div class="row">
			<div class="col-md-3">
				<label style="font-size:20px">Adicionar pastel ao pedido</label>
			</div>
			<div class="col-md-2">
				<select id="add_new" class="form-select">
					<option disabled selected value="0">Adicionar pastel</option>
					@foreach ($pasteis as $pastel)
						@if(array_search($pastel->id, array_column($pastel_pedido->toArray(), 'pastel_id')) === false) {{-- somente pasteis não presentes no pedido --}}
							<option value="{{$pastel['id']}}">{{ $pastel['titulo'] }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="col-md-3">
				<button class="btn btn-primary " onclick="EditOrder_AddNew( '{{route('pastel_pedido.store')}}', {{$pedido->id}})">Adicionar pastel</button>
			</div>
		</div>
	</form>





{{-- BUTTON ADD PASTEL AND REFRESH PAGE --}}

@endsection
