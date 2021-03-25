<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;    
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





Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->middleware('auth');
Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->middleware('auth');
Route::post('/users', [App\Http\Controllers\UsersController::class, 'store'])->middleware('auth');
Route::get('/users/{user}/edit',[App\Http\Controllers\UsersController::class, 'edit'])->middleware('auth'); 
Route::match(['put','patch'], '/users/{user}', [App\Http\Controllers\UsersController::class, 'update'])->middleware('auth');  
Route::delete('users/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->middleware('auth');
Route::get('/users/{id}/passwordEdit', [App\Http\Controllers\UsersController::class, 'passwordEdit'])->middleware('auth');
Route::post('/users/passwordUpda', [App\Http\Controllers\UsersController::class, 'passwordUpda'])->middleware('auth');
Route::get('/list/createList', [App\Http\Controllers\PriceListController::class, 'create'])->middleware('auth');
Route::post('/lists', [App\Http\Controllers\PriceListController::class, 'store'])->middleware('auth');
Route::get('/lists', [App\Http\Controllers\PriceListController::class, 'index'])->middleware('auth');
Route::get('/lists/{id}/edit', [App\Http\Controllers\PriceListController::class, 'edit'])->middleware('auth');
Route::match(['put','patch'], '/lists/{list}', [App\Http\Controllers\PriceListController::class, 'update'])->middleware('auth'); 
Route::delete('lists/{id}', [App\Http\Controllers\PriceListController::class, 'destroy'])->middleware('auth');
Route::get('/products/{id}', [App\Http\Controllers\ProductsController::class, 'index'])->middleware('auth');
Route::get('/products/create/{id}', [App\Http\Controllers\ProductsController::class, 'create'])->middleware('auth');
Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store'])->middleware('auth');