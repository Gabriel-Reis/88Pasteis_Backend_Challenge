<?php
use App\User;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () { return view('welcome'); });//->middleware('verified');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Email Sender Route
Route::get('email_NewOrder',function(){
	return new \App\Mail\NewOrder();  //Ver página HTML com email
	// Illuminate\Support\Facades\Mail::send(new \App\Mail\NewOrder()); //Enviar email
});

//Página com cardapio
Route::get('/cardapio', function () { return view('cardapio'); })->name('cardapio');;//->middleware('verified');