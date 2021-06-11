@extends('layouts.app')

@section('content')
	
	<div class="container">
		
	</div>


	<table class="table table-bordeless">
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
					<td> {{$pasteis[$pastel->id]['titulo']}} </td>
					<td> {{$pastel->quantidade}} </td>
					<td> {{$pasteis[$pastel->id]['preco_unit']}} </td>
					<td> {{$pasteis[$pastel->id]['preco_unit']*$pastel->quantidade}} </td>
					{{-- <img src="{{$pasteis[$pastel->id]['foto']}}" style="width: 400px"> --}}
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				@if ($pedido->cupom_id != null)
					<td colspan="4">Cupom de desconto usado: {{$cupons[$pedido->cupom_id-1]['descricao']}}</td>
				@else
					<td colspan="4" align="left">Nenhum cupom de desconto usado</td>
				@endif
			</tr>
			<tr>
				<td colspan="3">Total do pedido</td>
				<td >{{$pedido->total}}</td>
			</tr>
			
		</tfoot>
	</table>

@endsection
