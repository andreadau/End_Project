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


Route::get('/', 'PageController@index')->name('homepage');
Route::get('/results', 'PageController@results')->name('results');
Route::get('/payment', 'PaymentController@index')->name('payment');
Route::post('/make', 'PaymentController@make')->name('make');
// Route::resource('guests/restaurants', 'RestaurantController');

// registrazione Admin
Auth::routes();
// Auth::routes(['register'=>false]);

// // Admin
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('restaurants', 'RestaurantController');
    Route::resource('types', 'TypeController');
    Route::resource('dishes', 'DishController');
    Route::resource('orders', 'OrderController');
});

Route::get('{any}', function () {
    return view('guests.index');
})->where('any','.*');

