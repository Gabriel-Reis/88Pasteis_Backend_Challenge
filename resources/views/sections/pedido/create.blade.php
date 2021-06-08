@extends('layouts.app')

@section('content')

@if (session()->has('cart') && count(session()->get('cart')) > 0) 

@php $cart = session()->get('cart'); $cartValue=0; @endphp

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-center">Realizar pedido</div>

				<div class="card-body">
					<form method="POST" action="{{ route('pedidos.store') }}">
						@csrf
						{{-- USER ID --}}
						<input id="user_id" type="hidden" class="form-control" value="{{Auth::user()->id}}" required utofocus>
						{{-- status_pedido_id --}}
						<input id="status_pedido_id" type="hidden" class="form-control" value="1" required utofocus>


						{{-- USER NAME (FOR VIEW ONLY) --}}
						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autocomplete="name" disabled="true">
							</div>
						</div>
						<br>


						{{-- Total --}}
						@foreach ($cart as $item)
							@php $cartValue+=$item['price']*$item['qnt']; @endphp
						@endforeach
						<div class="form-group row">
							<label for="total" class="col-md-4 col-form-label text-md-right">Total</label>

							<div class="col-md-6">
								<input id="total" type="number" class="form-control" name="name" value="{{number_format($cartValue,2)}}" required disabled="true">
							</div>
						</div>
						<br>


						{{-- cpf --}}
						<div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" placeholder="Ex.: 123.456.789-10">

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<br>


						{{-- obs --}}
						<div class="form-group row">
                            <label for="obs" class="col-md-4 col-form-label text-md-right">Observações</label>

                            <div class="col-md-6">
                            	<textarea id="obs" name="obs" rows="4" cols="50"  class="form-control @error('obs') is-invalid @enderror" name="obs" value="{{ old('obs')}}" placeholder="Ex.: Pastel de calabresa sem cebola"></textarea>

                                @error('obs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<br>

						{{-- forma_pag_id --}}
						<div class="form-group row">
                            <label for="forma_pag_id" class="col-md-4 col-form-label text-md-right">Forma de pagamento</label>

                            <div class="col-md-6">
                            	<select id="forma_pag_id" class="form-select" name="forma_pag_id">
									@foreach ($pagamentos as $item)
										@php echo "<option value=".$item['id'].">".$item['descricao']."</option>"; @endphp
									@endforeach
									
								</select>
                            </div>
                        </div>
						<br>


						{{-- cupom_id --}}
						<div class="form-group row">
                            <label for="cupom_id" class="col-md-4 col-form-label text-md-right">Cupom de desconto</label>

                            <div class="col-md-6">
                            	<select onchange="PriceUpdate({{$cartValue}}, this.value, {{$cupons}})" id="cupom_id" class="form-select" name="forma_pag_id">
									<option value="0" selected="true">Escolha um cupom</option>
									@foreach ($cupons as $item)
										@php 
											echo "<option value=\"".$item['id']."\"";
											if($item['min_value'] > $cartValue)
												echo "disabled";
											echo ">".$item['descricao']." - Valor mínimo: R\$".$item['min_value'] ." </option>"; 
										@endphp
									@endforeach
								</select>
                            </div>
                        </div>
						<br>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<h1> CUPOM PARA PRIMEIRO(s) PEDIDO (SEED + PHP)</h1>
<h1> MOSTRAR VALOR DO DECONTO NO FIM E PADRÃO EM CIMA </h1>

@endif
@endsection