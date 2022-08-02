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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/index/transaction', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');
    Route::get('/create/transaction', [App\Http\Controllers\TransactionController::class, 'create'])->name('create.transaction');
    Route::get('/user/edit', [App\Http\Controllers\TransactionController::class, 'edit'])->name('user.edit');
    Route::post('/store/transaction', [App\Http\Controllers\TransactionController::class, 'store'])->name('store.transaction');
    Route::put('/user/update/{id}', [App\Http\Controllers\TransactionController::class, 'update'])->name('user.update');


    Route::group(['middleware' => ['admin']], function () {

        Route::get('/all/transaction', [App\Http\Controllers\TransactionController::class, 'getAll'])->name('getAll');
    });
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

