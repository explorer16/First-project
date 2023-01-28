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

Route::get('/main', [\App\Http\Controllers\mainPageController::class, 'show']);

Route::prefix('/user')->group(function (){
    Route::post('/registration',[\App\Http\Controllers\registrationController::class,'show']);
    Route::post('/authentication',[\App\Http\Controllers\authenticationController::class,'show']);
    Route::delete('/delete',[\App\Http\Controllers\deleteController::class,'show']);
    Route::get('/show',[\App\Http\Controllers\showController::class,'show']);
});

Route::get('/tasks',[\App\Http\Controllers\taskController::class]);
