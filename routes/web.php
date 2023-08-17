<?php

use App\Http\Controllers\authenticationController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\registrationController;
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
Route::get('/', function(){
    return redirect('/book/list/1');
});
Route::get('/main', [mainPageController::class, 'show']);

Route::prefix('/user')->group(function (){
    Route::view('/registration', 'pages/registration')->name('registration');
    Route::view('/login','pages/login')->name('login');
    Route::post('/check', [AuthenticationController::class, 'check'])->name('check');
    Route::delete('/delete',[deleteController::class,'show']);
    Route::get('/show',[showController::class,'show']);
});

Route::prefix('/book')->group(function (){
    Route::match(['get','post'],'/list/{page?}', [bookController::class, 'getList'])->name('book.list')->middleware('setting.parameters');
    Route::get('/retell/{page}', [bookController::class, 'getBookInfo'])->name('retell');
    Route::get('/created', [bookController::class, 'create'])->name('create');
    Route::get('/updated', [bookController::class, 'update'])->name('update');
    Route::get('/deleted', [bookController::class, 'delete'])->name('delete');
});

Route::view('/address', 'pages.address')->name('address');
