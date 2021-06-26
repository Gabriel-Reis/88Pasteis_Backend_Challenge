@extends('layouts.app')

@section('content')
	
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
					<td> {{$pasteis[$pastel->pastel_id-1]['titulo']}} </td>
					<td> {{$pastel->quantidade}} </td>
					<td> R$ {{ number_format($pasteis[$pastel->pastel_id-1]['preco_unit'],2) }}</td>
					<td> R$ {{ number_format($pasteis[$pastel->pastel_id-1]['preco_unit']*$pastel->quantidade,2) }} </td>
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
