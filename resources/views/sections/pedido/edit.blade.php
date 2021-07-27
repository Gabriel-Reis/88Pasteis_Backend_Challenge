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
							<input type="button" value="-" class="minus order_edit_minus"><input type="number" step="1" min="0" max="" name="qnt" value="{{$pastel->quantidade}}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus order_edit_plus">
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




{{-- BUTTON ADD PASTEL AND REFRESH PAGE --}}

@endsection
