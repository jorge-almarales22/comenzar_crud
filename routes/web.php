<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registroclientes', function () {
    return view('registroclientes');
});
Route::get('/loginclientes', function () {
    return view('loginclientes');
});
Route::get('/factura', function () {
    return view('factura');
});


Route::get('/token', function () {
    
    echo csrf_token();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('/clientes')->group(function () {

    Route::get('/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('create.cliente');//DONE
    Route::get('/updating/{cliente}', [App\Http\Controllers\ClienteController::class, 'updating'])->name('updating.cliente');//DONE
    Route::post('/store', [App\Http\Controllers\ClienteController::class, 'store'])->name('store.cliente');//DONE
    Route::post('/update', [App\Http\Controllers\ClienteController::class, 'update'])->name('update.cliente');//DONE
    Route::get('/destroy/{cliente}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('destroy.cliente');//DONE
    
});

Route::prefix('/tiendas')->group(function () {

    Route::get('/create', [App\Http\Controllers\TiendaController::class, 'create'])->name('create.tienda');
    Route::post('/store', [App\Http\Controllers\TiendaController::class, 'store'])->name('store.tienda');
    Route::post('/update', [App\Http\Controllers\TiendaController::class, 'update'])->name('update.tienda');
    Route::post('/destroy', [App\Http\Controllers\TiendaController::class, 'destroy'])->name('destroy.tienda');
});

Route::prefix('/facturas')->group(function () {

    Route::get('/create', [App\Http\Controllers\FacturaController::class, 'create'])->name('create.factura');
    Route::post('/store', [App\Http\Controllers\FacturaController::class, 'store'])->name('store.factura');
    Route::post('/update', [App\Http\Controllers\FacturaController::class, 'update'])->name('update.factura');
    Route::post('/destroy', [App\Http\Controllers\FacturaController::class, 'destroy'])->name('destroy.factura');
});

Route::prefix('/saldos')->group(function () {

    Route::get('/create', [App\Http\Controllers\SaldoController::class, 'create'])->name('create.saldo');
    Route::post('/store', [App\Http\Controllers\SaldoController::class, 'store'])->name('store.saldo');
    Route::post('/update', [App\Http\Controllers\SaldoController::class, 'update'])->name('update.saldo');
    Route::post('/destroy', [App\Http\Controllers\SaldoController::class, 'destroy'])->name('destroy.saldo');
});

Route::prefix('/tickets')->group(function () {
    
    Route::get('/create', [App\Http\Controllers\TicketController::class, 'create'])->name('create.ticket');
    Route::post('/store', [App\Http\Controllers\TicketController::class, 'store'])->name('store.ticket');
    Route::post('/update', [App\Http\Controllers\TicketController::class, 'update'])->name('update.ticket');
    Route::post('/destroy', [App\Http\Controllers\TicketController::class, 'destroy'])->name('destroy.ticket');
});
// routes/web.php
