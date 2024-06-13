<?php

use App\Mail\ConfirmAccount;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    //return (new ConfirmAccount( [ 'name' => 'EmmKall', 'link' => 'localhost:8000/confirm/57348956374' ] ) );
});
