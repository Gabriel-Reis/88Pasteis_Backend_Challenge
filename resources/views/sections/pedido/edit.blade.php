@extends('layouts.app')

@section('content')





{{-- 	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header text-center">Atualizar pedido</div>

					<div class="card-body">

						<div class="row mb-0">
							<div class="col-sm-4 col-form-label">
								Pastel
							</div>
							<div class="col-sm-2 col-form-label">
								Quantidade
							</div>
							<div class="col-sm-3 col-form-label">
								Preço unitário
							</div>
							<div class="col-sm-3 col-form-label">
								Preço total
							</div>
						</div>

						<form method="put" action="{{route('pedidos.update', $pedido->id)}}">
							@foreach ($pastel_pedido as $pastel)
							<div class="row mb-4">
	                            <label for="{{$pasteis[$pastel->pastel_id-1]['titulo']}} " class="col-sm-4 col-form-label text-md-right">{{$pasteis[$pastel->pastel_id-1]['titulo']}} </label>

	                            <div class='col-sm-2 col-form-label quantity buttons_added'><input type='button' value='-' class='minus order_edit_minus'><input type='number' id='{{$pastel->pastel_id-1}}qnt' step='1' min='0' max='' name='{{$pastel->pastel_id-1}}quantity' value='{{$pastel->quantidade}}' title='Qty' class='input-text qty text' size='4' pattern='' inputmode=''><input type='button' value='+' class='plus order_edit_plus'></div>

	                            <div class="col-sm-3 col-form-label">
	                            	<input class="form-control" type='text' id='{{$pastel->pastel_id-1}}unit' name='{{$pastel->pastel_id-1}}unit' value='R$ {{ number_format($pasteis[$pastel->pastel_id-1]['preco_unit'],2) }}' disabled>
	                            </div>

	                            <div class="col-sm-3 col-form-label">
	                            	<input class="form-control" type='text' id='{{$pastel->pastel_id-1}}price' name='{{$pastel->pastel_id-1}}price' value='R$ {{ number_format($pasteis[$pastel->pastel_id-1]['preco_unit']*$pastel->quantidade,2) }}' disabled>
	                            </div>
	                        </div>
							@endforeach

							<hr>

							<div class="form-group row container">
							    <select id="add_new" class="form-select">
									<option disabled selected value="0">Adicionar um novo pastel</option>
									@foreach ($pasteis as $pastel)
										@if(array_search($pastel->id, array_column($pastel_pedido->toArray(), 'pastel_id')) === false)
											<option value="{{$pastel['id']}}">{{ $pastel['titulo'] }}</option>
										@endif
									@endforeach
								</select>
						    </div>							

							<div class="form-group row container">
								<label for="total" class="col-sm-4 col-form-label text-md-right">Total do pedido</label>
	                            <div class="col-sm-5 col-form-label">
	                            </div>						
	                            <div class="col-sm-3 col-form-label">
									<input class="form-control" type="text" value="R$ {{$pedido->total}}" disabled>
						    	</div>							
						    </div>							

							<div class="form-group row container">
								<input class="btn btn-success" type="submit" value="Atualizar pedido">
						    </div>
					  	</form>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

{{-- <table id="DataTable" class="table table-bordeless table-hover align">
		<thead>
			<tr>
				<th>Pastel</th>
				<th>Quantidade</th>
				<th>Preço unitário</th>
				<th>Preço total</th>
			</tr>
		</thead>
	</table> --}}

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
				<input class="form-control" type='hidden' id='pedido_id' name='pedido_id' value={{$pedido->id}}>
				<input class="form-control" type='hidden' id='pastel_pedido_id' name='pastel_pedido_id' value={{$pastel->id}} >

				<div id="row" name="row" class="row mb-3 mt-3">
					<div class="col-md-3">
						<label style="font-size:20px">{{$pasteis[$pastel->pastel_id-1]['titulo']}}</label>
					</div>

					<div class="col-md-2">
						<div class="quantity buttons_added"> 
							<input type="button" value="-" class="minus order_edit_minus"><input type="number" id="qnt" step="1" min="0" max="" name="qnt" value="{{$pastel->quantidade}}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus order_edit_plus">
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



{{-- ADD TOTAL PRICE --}}
{{-- ATUALIZAR SEND TO DATABASE --}}
{{-- BUTTON ADD PASTEL AND REFRESH PAGE --}}




















			{{-- <input form="update_form" class="form-control" type='hidden' id='pedido_id' name='pedido_id' value={{$pedido->id}} >
			<table id="DataTable" class="table table-bordeless table-hover align">
				<thead>
					<tr>
						<th>Pastel</th>
						<th>Quantidade</th>
						<th>Preço unitário</th>
						<th>Preço total</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($pastel_pedido as $pastel)
					<tr>
						<input form="update_form" class="form-control" type='hidden' id='pastel_id' name='pastel_id' value={{$pastel->pastel_id}} >
						<td> {{$pasteis[$pastel->pastel_id-1]['titulo']}} </td>
						<td>
							<div class="quantity buttons_added"> 
								<input type="button" value="-" class="minus order_edit_minus"><input type="number" id="qnt" step="1" min="0" max="" name="quantity" value="{{$pastel->quantidade}}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" form="update_form"><input type="button" value="+" class="plus order_edit_plus">
							</div>
						</td>
						<td id='unit' name='unit'><input form="update_form" id='unit_in' name='unit_in' class="form-control" type='text'  value='R$ {{ number_format($pasteis[$pastel->pastel_id-1]['preco_unit'],2) }}' ></td>
						<td><input form="update_form" class="form-control" type='text' id='price' name='price' value='R$ {{ number_format($pasteis[$pastel->pastel_id-1]['preco_unit']*$pastel->quantidade,2) }}' ></td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">Total do pedido</td>
						<td id='price_total' name='price_total'> <input type="text" name="total" form="update_form" id="total" value="R$ {{$pedido->total}}"> </td>
					</tr>
					<tr>
						<td>
							<select form="update_form" id="add_new" class="form-select">
								<option disabled selected value="0">Adicionar um novo pastel</option>
								@foreach ($pasteis as $pastel)
								@if(array_search($pastel->id, array_column($pastel_pedido->toArray(), 'pastel_id')) === false)
								<option value="{{$pastel['id']}}">{{ $pastel['titulo'] }}</option>
								@endif
								@endforeach
							</select>
						</td>
						<td>
							<button class="btn btn-success btn-lg" onclick="InsertRow_pedidoEdit2( '{{route('pastel_pedido.store')}}', {{$pedido->id}})">Adicionar pastel</button>
						</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						@if ($pedido->cupom_id != null)
						<td colspan="4">Cupom de desconto usado: {{$cupons[$pedido->cupom_id-1]['descricao']}}</td>
						@else
						<td colspan="4" align="left">Nenhum cupom de desconto usado</td>
						@endif
					</tr>
				</tfoot>
			</table>
			<form id="update_form" method="post" action="{{route('pedidos.update', $pedido->id)}}">
				@csrf
				{{ method_field('PATCH') }}
				<div class="form-group row container">
					<button type="submit" class="btn btn-success">Atualizar</button>
				</div>
			</form> --}}






















{{-- 	<table id="DataTable" class="table table-bordeless table-hover align">
		<thead>
			<tr>
				<th hidden>id</th>
				<th>Pastel</th>
				<th>Quantidade</th>
				<th>Preço unitário</th>
				<th>Preço total</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($pastel_pedido as $pastel)
				<tr>
					<td id="pedido_id" hidden> {{$pasteis[$pastel->pastel_id-1]['id']}} </td>
					<td> {{$pasteis[$pastel->pastel_id-1]['titulo']}} </td>
					<td>
						<div class="quantity buttons_added"> 
							<input type="button" value="-" class="minus order_edit_minus"><input type="number" id="qnt" step="1" min="0" max="" name="quantity" value="{{$pastel->quantidade}}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus order_edit_plus">
						</div>
					</td>
					
					<td id="unit">R$ {{ number_format($pasteis[$pastel->pastel_id-1]['preco_unit'],2) }}</td>
					<td id="price">R$ {{ number_format($pasteis[$pastel->pastel_id-1]['preco_unit']*$pastel->quantidade,2) }} </td>

				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3">Total do pedido</td>
				<td id="total">R$ {{$pedido->total}}</td>
			</tr>
			<tr>
				<td>
					<select id="add_new" class="form-select">
						<option disabled selected value="0">Adicionar um novo pastel</option>
						@foreach ($pasteis as $pastel)
							@if(array_search($pastel->id, array_column($pastel_pedido->toArray(), 'pastel_id')) === false)
								<option value="{{$pastel['id']}}">{{ $pastel['titulo'] }}</option>
							@endif
						@endforeach
					</select>
				</td>
				<td>
					<button class="btn btn-success btn-lg" onclick="InsertRow_pedidoEdit2( '{{route('pastel_pedido.store')}}', {{$pedido->id}})">Adicionar pastel</button>
				</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				@if ($pedido->cupom_id != null)
					<td colspan="4">Cupom de desconto usado: {{$cupons[$pedido->cupom_id-1]['descricao']}}</td>
				@else
					<td colspan="4" align="left">Nenhum cupom de desconto usado</td>
				@endif
			</tr>
		</tfoot>
	</table> --}}





{{--     <div class="container mt-3">

        <div class="row">
            <div class="col"> 
                <a href="{{route('pedidos.update', $pedido->id)}}" class="btn btn-warning btn-lg" role="button" aria-disabled="true">Atualizar pedido</a>
            </div>
        </div>
    </div> --}}

    @endsection
