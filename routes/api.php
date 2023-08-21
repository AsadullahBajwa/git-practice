<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\PlayerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)->group(function (){
    Route::get('/products', 'index');
    Route::post('/product', 'store');
    Route::put('/product/{id}', 'update');
    Route::delete('/product/{id}', 'destroy');
});


// apis for player

Route::post('addPlayer',[PlayerController::class,'store']);
Route::get('players',[PlayerController::class,'index']);
Route::post('updatePlayer/{id}',[PlayerController::class,'update']);
Route::delete('delPlayer/{id}',[PlayerController::class,'destroy']);