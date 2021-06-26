@extends('layouts.app')

@section('content')

	<table id="DataTable" class="table table-bordeless table-hover align">
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
					<td id="id" hidden> {{$pasteis[$pastel->pastel_id-1]['id']}} </td>
					<td> {{$pasteis[$pastel->pastel_id-1]['titulo']}} </td>
					<td>
						<div class="quantity buttons_added"> 
							<input type="button" value="-" class="minus order_edit_minus"><input type="number" id="qnt" step="1" min="0" max="" name="quantity" value="{{$pastel->quantidade}}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus order_edit_plus">
						</div>
					</td>
					{{-- <td> {{$pastel->quantidade}} </td> --}}
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
	</table>

     <div class="container mt-3">
{{--        <div class="row">
            <div class="col"> 
        		<select class="form-select">
					<option selected value="0">Adicionar um novo pastel</option>
					@foreach ($pasteis as $pastel)
						@if(array_search($pastel->id, array_column($pastel_pedido->toArray(), 'pastel_id')) === false)
							<option value="{{$pastel['id']}}">{{ $pastel['titulo'] }}</option>
						@endif
					@endforeach
				</select>
        	</div>
            <div class="col"> 
        		<button class="btn btn-success btn-lg" onclick="">Adicionar pastel</button>
        	</div>
       	</div> --}}


        <div class="row">
            <div class="col"> 
                <a href="{{route('pedidos.update', $pedido->id)}}" class="btn btn-warning btn-lg" role="button" aria-disabled="true">Atualizar pedido</a>
            </div>
        </div>
    </div>

@endsection
