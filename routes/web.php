<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('noaccess',function(){
    return view('noaccess');
});



Route::group(['middleware'=>['protectedPage']],function(){
    Route::get('/', function () {
        return view('welcome');
    });

    

    Route::get('home',function(){
        return view('home');
    });
});

Route::get('/test-mongodb', function () {
    try {
        DB::connection('mongodb')->getMongoClient();
        return "MongoDB connected!";
    } catch (\Exception $e) {
        return "MongoDB not connected. Error: " . $e->getMessage();
    }
})->middleware('protectPage');