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