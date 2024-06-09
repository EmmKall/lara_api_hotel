<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CuartoController;
use App\Http\Controllers\HuespedController;
use App\Http\Controllers\PisoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Piso
Route::get( '/piso', [ PisoController::class, 'index' ] )->name( 'piso.index' );
Route::get( '/piso/{id}', [ PisoController::class, 'find' ] )->name( 'piso.find' );
Route::post( '/piso', [ PisoController::class, 'store' ] )->name( 'piso.store' );
Route::put( '/piso/{id}', [ PisoController::class, 'update' ] )->name( 'piso.update' );
Route::delete( '/piso/{id}', [ PisoController::class, 'destroy' ] )->name( 'piso.destroy' );
//Cuarto
Route::get( '/cuarto', [ CuartoController::class, 'index' ] )->name( 'cuarto.index' );
Route::get( '/cuarto/{id}', [ CuartoController::class, 'find' ] )->name( 'cuarto.find' );
Route::post( '/cuarto', [ CuartoController::class, 'store' ] )->name( 'cuarto.store' );
Route::put( '/cuarto/{id}', [ CuartoController::class, 'update' ] )->name( 'cuarto.update' );
Route::delete( '/cuarto/{id}', [ CuartoController::class, 'destroy' ] )->name( 'cuarto.destroy' );
//Huesped
Route::get( '/huesped', [ HuespedController::class, 'index' ] )->name( 'huesped.index' );
Route::get( '/huesped/{id}', [ HuespedController::class, 'find' ] )->name( 'huesped.find' );
Route::post( '/huesped', [ HuespedController::class, 'store' ] )->name( 'huesped.store' );
Route::put( '/huesped/{id}', [ HuespedController::class, 'update' ] )->name( 'huesped.update' );
Route::delete( '/huesped/{id}', [ HuespedController::class, 'destroy' ] )->name( 'huesped.destroy' );
//Books
Route::get( '/book', [ BookController::class, 'index' ] )->name( 'book.index' );
Route::get( '/book/{id}', [ BookController::class, 'find' ] )->name( 'book.find' );
Route::post( '/book', [ BookController::class, 'store' ] )->name( 'book.store' );
Route::put( '/book/{id}', [ BookController::class, 'update' ] )->name( 'book.update' );
Route::delete( '/book/{id}', [ BookController::class, 'destroy' ] )->name( 'book.destroy' );
