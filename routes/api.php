<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/auth')->group(function () {
    
    Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);

});

Route::prefix('/clientes')->group(function () {

    Route::get('/', [\App\Http\Controllers\Api\Cliente\ClienteController::class, 'index']);
    Route::get('/info', [\App\Http\Controllers\Api\Cliente\ClienteController::class, 'infoSelect']);
    Route::post('/store', [\App\Http\Controllers\Api\Cliente\ClienteController::class, 'store']);
    Route::put('/update/{cliente}', [\App\Http\Controllers\Api\Cliente\ClienteController::class, 'update']);
    Route::delete('/delete/{cliente}', [\App\Http\Controllers\Api\Cliente\ClienteController::class, 'delete']);
    Route::get('/show/{documento}', [\App\Http\Controllers\Api\Cliente\ClienteController::class, 'show']);

});

Route::prefix('/facturas')->group(function () {

    Route::post('/store', [\App\Http\Controllers\Api\Facturas\FacturaController::class, 'guardarFactura']);
    Route::post('/show', [\App\Http\Controllers\Api\Facturas\FacturaController::class, 'BuscarFacturasPorCliente']);
    Route::post('/redimir', [\App\Http\Controllers\Api\Facturas\FacturaController::class, 'RedimirFacturas']);

});

Route::prefix('/tiendas')->group(function () {

    Route::post('/store', [\App\Http\Controllers\Api\Tiendas\TiendaController::class, 'store']);
    Route::put('/update/{tienda_id}', [\App\Http\Controllers\Api\Tiendas\TiendaController::class, 'update']);
    Route::delete('/destroy/{tienda_id}', [\App\Http\Controllers\Api\Tiendas\TiendaController::class, 'destroy']);

});

Route::prefix('/campañas')->group(function () {

    Route::post('/store', [\App\Http\Controllers\Api\Campañas\CampañaController::class, 'store']);
    Route::put('/update/{campaña_id}', [\App\Http\Controllers\Api\Campañas\CampañaController::class, 'update']);
    Route::delete('/destroy/{campaña_id}', [\App\Http\Controllers\Api\Campañas\CampañaController::class, 'destroy']);

});