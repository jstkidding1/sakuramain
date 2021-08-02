<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

// Route::post('users', 'UserController@store');
Route::get('vehicle', 'VehicleController@index');
Route::get('users', 'UserController@index');
Route::get('vehicle/{vehicle}', 'VehicleController@show');
Route::delete('vehicle/{id}', 'VehicleController@destroy');

Route::get('products', 'ProductController@index');
// Route::post('upload-file', 'ProductController@uploadImage');
Route::get('products/{product}', 'ProductController@show');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('users/{user}/reservations', 'UserController@showReservations');
    Route::get('users/{user}/orders','UserController@showOrders');
    Route::resource('reservations', 'ReservationController');
    Route::resource('users', 'UserController')->except(['index', 'show']);
    Route::resource('vehicle', 'VehicleController')->except(['index', 'show']);
    Route::patch('products/{product}/units/add','ProductController@updateUnits');
    Route::resource('products', 'ProductController')->except(['index','show']);
    Route::patch('orders/{order}/deliver','OrderController@deliverOrder');
    Route::patch('reservations/{reservation}/approved','ReservationController@reserveCar');
    Route::resource('orders', 'OrderController');
});

