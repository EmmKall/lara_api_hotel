<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CuartoController;
use App\Http\Controllers\HuespedController;
use App\Http\Controllers\PisoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware( 'auth:api' )->prefix( 'auth')->group( function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::middleware( ['auth:api'] )->prefix( '' )->group( function ( $router ) {
    //User
    Route::get( '/user', [ UserController::class, 'index' ] )->name( 'user.index' );
    Route::get( '/user/{id}', [ UserController::class, 'find' ] )->name( 'user.find' );
    Route::get( '/user/verify/{token}', [ UserController::class, 'verify' ] )->name( 'user.verify' );
    Route::post( '/user/forget', [ UserController::class, 'forgetPass' ] )->name( 'user.forgetPass' );
    Route::post( '/user/change_pass', [ UserController::class, 'changePass' ] )->name( 'user.changePass' );
    Route::post( '/user', [ UserController::class, 'store' ] )->name( 'user.store' );
    Route::put( '/user/{id}', [ UserController::class, 'update' ] )->name( 'user.update' );
    Route::delete( '/user/{id}', [ UserController::class, 'destroy' ] )->name( 'user.destroy' );
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
    Route::put( '/book/check_in/{id}', [ BookController::class, 'checkIn' ] )->name( 'book.check_in' );
    Route::delete( '/book/{id}', [ BookController::class, 'destroy' ] )->name( 'book.destroy' );
});


