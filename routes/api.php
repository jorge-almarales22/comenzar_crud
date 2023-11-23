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

Route::prefix('/factura')->group(function () {
    Route::post('/store', [\App\Http\Controllers\Api\Factura\FacturaController::class, 'store']); 
    Route::get('/BuscarClienteConFacturas/{documento}', [\App\Http\Controllers\Api\Factura\FacturaController::class, 'BuscarClienteConFacturas']);
    

});

Route::prefix('/campaña')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\Campaña\CampañaController::class, 'index']);
    Route::post('/store', [\App\Http\Controllers\Api\Campaña\CampañaController::class, 'store']);
    Route::put('/update/{idCampaña}', [\App\Http\Controllers\Api\Campaña\CampañaController::class, 'update']);
    Route::delete('/delete/{idCampaña}', [\App\Http\Controllers\Api\Campaña\CampañaController::class, 'delete']);
    Route::get('/show/{idCampaña}', [\App\Http\Controllers\Api\Campaña\CampañaController::class, 'show']);
   });