@extends('layouts.app')

@section('content')
	
	{{-- @php var_dump($pedidos); @endphp --}}
	
	<table id="DataTable" class="table table-bordeless align">
		<thead>
			<tr>
				<th>Data do pedido</th>
				<th>Valor pago</th>
				<th>Status atual</th>
				<th>Ver pedido</th>
				@if(auth()->user()->tipo >= 1)
					<th>Editar pedido</th>
					<th>Excluir pedido</th>
				@endif
			</tr>
		</thead>
		<tbody>
			@foreach ($pedidos as $pedido)
	    			@php 
			    		$datetime = new DateTime($pedido['created_at']); 
			    		$data = "".$datetime->format('d/m/Y - H:i');
			    	@endphp
			    <tr>
			    	<td>{{$data}}</td>
			    	<td>R$ {{$pedido->total}}</td>
			    	<td>{{$status_pedido[$pedido->status_pedido_id]['descricao']}}</td>
			    	{{-- <td><img src="{{$pagamentos[$pedido->forma_pag_id]['foto']}}" style="max-width: 40px"></td> --}}
			    	<td>
			    		<form action="{{ route('pedidos.show', $pedido->id) }}" method="GET">
                        	<button class="btn btn-primary" type="submit" >Ver</button>
                    	</form>
                    </td>
                    @if(auth()->user()->tipo >= 1)
						<td>
				    		<form action="{{ route('pedidos.edit', $pedido->id) }}" method="GET">
	                        	<button class="btn btn-warning" type="submit" >Editar</button>
	                    	</form>
	                    </td>
	                    <td>
				    		<form action="{{ route('pedidos.destroy', $pedido->id) }}" method="GET">
	                        	<button class="btn btn-danger" type="submit" >Excluir</button>
	                    	</form>
                    	</td>
					@endif
			    </tr>
			@endforeach

		</tbody>

	</table>

@endsection
