@extends('layouts.app')

@section('content')
		
	<table id="Pedidos_all" class="table table-bordeless table-hover align">
		<thead>
			<tr>
				<th>ID</th>
				<th>Data</th>
				<th>Hora</th>
				<th>Valor pago</th>
				<th>Status atual</th>
				<th>Usuário</th>
				<th>Endereço</th>
				<th>Bairro</th>
				<th>Ver pedido</th>
				<th>Editar pedido</th>
				<th>Excluir pedido</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($pedidos as $pedido)
	    			@php 
			    		$datetime = new DateTime($pedido['created_at']); 
			    		$data = "".$datetime->format('d/m/Y');
			    		$hora = "".$datetime->format('H:i');
			    	@endphp
			    <tr>
			    	<td> {{$pedido->id}}</td>
			    	<td> {{$data}}</td>
			    	<td> {{$hora}}</td>
			    	<td> R$ {{$pedido->total}}</td>
			    	<td> 
			    		<select name="status_pedido_id" id="status_pedido_id" class="form-select" onchange="StatusPedidoUpdate({{$pedido->id}}, this.value, {{ Auth::user()->id }})">
			    			@foreach($status_pedido as $status)
								<option value={{$status['id']}}
									@if($status['id'] == $status_pedido[$pedido->status_pedido_id]['id'])
										selected
									@endif>
								{{$status['descricao']}} </option>
							@endforeach
						</select>
			    	</td>
			    	<td> {{$users[$pedido->user_id-1]['name']}}</td>
			    	<td> {{$users[$pedido->user_id-1]['endereco']}} {{$users[$pedido->user_id-1]['complemento']}}</td>
			    	<td> {{$users[$pedido->user_id-1]['bairro']}}, {{$users[$pedido->user_id-1]['cidade']}}</td>

			    	<td align="center" valign="middle">
			    		<form action="{{ route('pedidos.show', $pedido->id) }}" method="GET">
                        	<button class="btn btn-primary" type="submit" >Ver</button>
                    	</form>
                    </td>

                    <td  align="center" valign="middle">
				    	<form action="{{ route('pedidos.edit', $pedido->id) }}" method="GET">
	                       	<button class="btn btn-warning" type="submit" >Editar</button>
	                   	</form>
	                </td>
	                
	                <td  align="center" valign="middle">
				    	<form action="{{ route('pedidos.destroy', $pedido->id) }}" method="GET">
	                       	<button class="btn btn-danger" type="submit" >Excluir</button>
	                   	</form>
                    </td>
			    </tr>
			@endforeach

		</tbody>

	</table>

@endsection
