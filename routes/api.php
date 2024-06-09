<?php

use App\Http\Controllers\PisoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get( '/piso', [ PisoController::class, 'index' ] )->name( 'piso.index' );
Route::get( '/piso/{id}', [ PisoController::class, 'find' ] )->name( 'piso.find' );
Route::post( '/piso', [ PisoController::class, 'store' ] )->name( 'piso.store' );
Route::put( '/piso/{id}', [ PisoController::class, 'update' ] )->name( 'piso.update' );
Route::delete( '/piso/{id}', [ PisoController::class, 'destroy' ] )->name( 'piso.destroy' );

