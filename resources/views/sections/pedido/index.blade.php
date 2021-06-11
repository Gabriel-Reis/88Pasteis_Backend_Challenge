@extends('layouts.app')

@section('content')
	
	{{-- @php var_dump($pedidos); @endphp --}}
	
	<table class="table table-bordeless">
		<thead>
			<tr>
				<th>Data do pedido</th>
				<th>Valor pago</th>
				<th>Status atual</th>
				<th>Ver pedido</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($pedidos as $pedido)
	    			@php 
			    		$datetime = new DateTime($pedido['created_at']); 
			    		$data = "".$datetime->format('d/m/Y H:i');
			    	@endphp
			    <tr>
			    	<td>{{$data}}</td>
			    	<td>{{$pedido->total}}</td>
			    	<td>{{$status_pedido[$pedido->status_pedido_id]['descricao']}}</td>
			    	{{-- <td><img src="{{$pagamentos[$pedido->forma_pag_id]['foto']}}" style="max-width: 40px"></td> --}}
			    	<td>
			    		<form action="{{ route('pedidos.show', $pedido->id) }}" method="GET">
                        
                        	<button class="btn btn-primary" type="submit" >Ver</button>
                    	</form>
                    </td>
			    </tr>
			@endforeach

		</tbody>

	</table>

@endsection
