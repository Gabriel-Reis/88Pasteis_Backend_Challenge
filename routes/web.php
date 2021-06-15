<?php
use App\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CupomController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PastelController;
use App\Http\Controllers\PastelPedidoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\StatusPedidoController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);
// Route::get('/', function () { return view('welcome'); });//->middleware('verified');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'welcome'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('/');

// Email Sender Route
Route::get('email_NewOrder',function(){
	return new \App\Mail\NewOrder();  //Ver página HTML com email
	// Illuminate\Support\Facades\Mail::send(new \App\Mail\NewOrder()); //Enviar email
});

Route::resource('carrinho', CarrinhoController::class);
Route::resource('cupons', CupomController::class);
Route::resource('pagamentos', PagamentoController::class);
Route::resource('pasteis', PastelController::class);
Route::resource('pastel_pedido', PastelPedidoController::class);
Route::resource('pedidos', PedidoController::class);
Route::resource('status_pedido', StatusPedidoController::class);



// Route::get('session_form', function () { return view('ajax_session'); });
Route::get('get_session', [SessionController::class, 'getsession']);
Route::get('clearsession', [SessionController::class, 'clearsession']);
Route::post('set_session', [SessionController::class, 'createsession'] );
//Página com cardapio
//Route::get('/cardapio', function () { return view('cardapio'); })->name('cardapio');;//->middleware('verified');