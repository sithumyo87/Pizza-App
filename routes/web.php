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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontend');
Route::get('/pizza/{id}/order', [App\Http\Controllers\FrontendController::class, 'pizzaOrder'])->name('pizza.order');
Route::post('/pizza/{id}/order', [App\Http\Controllers\FrontendController::class, 'storeOrder'])->name('order.store');

Route::group(['middleware'=>['auth','admin']],function (){
    Route::get('/pizza', [App\Http\Controllers\PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/pizza/create', [App\Http\Controllers\PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/pizza/create', [App\Http\Controllers\PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/pizza/{id}/edit', [App\Http\Controllers\PizzaController::class, 'edit'])->name('pizza.edit');
    Route::put('/pizza/{id}/edit', [App\Http\Controllers\PizzaController::class, 'update'])->name('pizza.update');
    Route::delete('/pizza/{id}/delete', [App\Http\Controllers\PizzaController::class, 'destroy'])->name('pizza.delete');

    Route::get('/user/order', [App\Http\Controllers\OrderController::class, 'index'])->name('user.order');
    Route::post('/order/{id}/status', [App\Http\Controllers\OrderController::class, 'changeState'])->name('order.changeState');

    Route::get('/customer', [App\Http\Controllers\OrderController::class, 'customer'])->name('order.customer');
});



