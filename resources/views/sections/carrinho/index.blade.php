@extends('layouts.app')

@section('content')


@if (session()->has('cart') && count(session()->get('cart')) > 0) 

@php 
	$cart = session()->get('cart'); 
	$total = 0;
@endphp

<div class="mask-container">
	<div class="mask"></div>
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th scope="col" colspan="2">Produto</th>
					<th scope="col">Quantidade</th>
					<th scope="col">Preço</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($cart as $item)
					@php  
						$dbID = $item['id'];
						$total += $pasteis[$dbID-1]->preco_unit * $item['qnt'];
					@endphp
					
					<tr> 
						<input id="ID" type="hidden" value="{{$dbID}}">
						<td valign="middle">
							<div class="cart-full-img"> 
								<img src="{{$pasteis[$dbID-1]->foto}}" alt="...">
							</div>
						</td>
						<td valign="middle"> 
							<div valign="middle">
								<h5>{{$pasteis[$dbID-1]->titulo}}</h5>
								<p>{{$pasteis[$dbID-1]->descricao}}</p>
							</div>
						</td>
						<td valign="middle"> 
							<div class="quantity buttons_added">	
								<input type="button" value="-" class="minus"><input type="number" id="qnt" step="1" min="1" max="" name="quantity" value="{{$item['qnt']}}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
							</div>
						</td>
						<td valign="middle"> 
							<b>R$ </b><b id="price">{{number_format($pasteis[$dbID-1]->preco_unit * $item['qnt'],2)}}</b>
						</td>
					</tr>
				@endforeach

				<tfoot>
					<tr>
						<th valign="middle" colspan="3"></th>
						<th valign="middle">
							<b>R$ </b><b id="price_total">{{number_format($total,2)}}</b>
						</th>
					</tr>
				</tfoot>

			</tbody>
		</table>
		<div class="container">
			<a style="float: right;" href="{{route('pedidos.create')}}" class="btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Confirmar e finalizar pedido</a>
		</div>
	</div>
</div>

@else

@endif

@endsection

