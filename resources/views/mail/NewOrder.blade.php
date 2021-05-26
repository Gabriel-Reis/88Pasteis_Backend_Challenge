@component('mail::message')

<h1>{{$name}}, muito obrigado por escolher a 88Pasteis, seguem os dados referentes ao seu pedido realizado em xx/xx/xxxx as xx:xx.</h1>

@component('mail::table')
| Produto       | quantidade   | Valor    | 
| ------------- |:------------:| --------:| 
| PASTEL X      | 01           | R$5      | 
| PASTEL Y      | 03           | R$15     | 
@endcomponent


@component('mail::panel') 
Valor total: R$ 20,00. 
@endcomponent 

@component('mail::button', ['url'=>"http://localhost:8000/"])
Verificar pedido online
@endcomponent

@endcomponent
