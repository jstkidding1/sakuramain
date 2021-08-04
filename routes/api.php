<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::get('users', 'UserController@index');

Route::get('vehicle', 'VehicleController@index');
Route::get('vehicle/{vehicle}', 'VehicleController@show');
Route::delete('vehicle/{id}', 'VehicleController@destroy');

Route::get('products', 'ProductController@index');
Route::get('products/{product}', 'ProductController@show');

Route::get('services', 'ServiceController@index');
Route::get('services/{service}', 'ServiceController@show');

Route::get('galleries', 'GalleryController@index');
Route::get('galleries/{gallery}', 'GalleryController@show');
// Route::delete('galleries/{id}', 'GalleryController@destroy');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('users/{user}/reservations', 'UserController@showReservations');
    Route::get('users/{user}/orders','UserController@showOrders');
    Route::get('users/{user}/appointments', 'UserController@showAppointments');
    Route::patch('products/{product}/units/add','ProductController@updateUnits');
    Route::patch('orders/{order}/deliver','OrderController@deliverOrder');
    Route::patch('appointments/{appointment}/approved', 'AppointmentController@setAppointment');
    Route::patch('reservations/{reservation}/approved','ReservationController@reserveCar');
    Route::resource('users', 'UserController')->except(['index', 'show']);
    Route::resource('vehicle', 'VehicleController')->except(['index', 'show']);
    Route::resource('products', 'ProductController')->except(['index','show']);
    Route::resource('services', 'ServiceController')->except(['index', 'show']);
    Route::resource('galleries', 'GalleryController')->except(['index', 'show']);
    Route::resource('reservations', 'ReservationController');
    Route::resource('orders', 'OrderController');
    Route::resource('appointments', 'AppointmentController');
});

