<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Middleware\ThrottleRequests;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('admin/login', 'AuthController@adminLogin');

Route::get('get/image', 'UserController@getImage');
Route::get('users', 'UserController@index');
Route::get('chart', 'UserController@chart');
Route::get('users/{user}', 'UserController@show');
// Route::get('graph', 'UserController@salesGraph');
// Route::get('monthlyGraph', 'UserController@monthlyChart');
// Route::get('weeklyGraph', 'UserController@weeklyChart');
Route::get('yearlyChart', 'UserController@yearlyOrderReport');
Route::get('monthlyChart', 'UserController@monthlyOrderReport');
Route::get('weeklyChart', 'UserController@weeklyOrderReport');
Route::get('weeklyReservationReport', 'UserController@weeklyReservationReport');
Route::get('yearlyReservation', 'UserController@yearlyReservationChart');
Route::get('monthlyReservationChart', 'UserController@monthlyReservationChart');
Route::get('count', 'UserController@countAllData');
Route::delete('users/{user}', 'UserController@destroy');

Route::post('contacts', 'ContactController@store');
Route::get('contacts', 'ContactController@index');
Route::get('contacts/{contact}', 'ContactController@show');

Route::get('vehicle', 'VehicleController@index');
Route::get('vehicle/available', 'VehicleController@getVehicleAvailable');
Route::get('vehicle/reviews', 'VehicleController@getReviews');
Route::get('vehicle/{vehicle}', 'VehicleController@show');

Route::get('products', 'ProductController@index');
Route::get('products/available', 'ProductController@getAvailableProducts');
Route::get('products/{product}', 'ProductController@show');

Route::get('services', 'ServiceController@index');
Route::get('services/{service}', 'ServiceController@show');

Route::get('galleries', 'GalleryController@index');
Route::get('galleries/{gallery}', 'GalleryController@show');

Route::get('inquiries', 'InquiryController@index');
Route::get('inquiries/{inquiry}', 'InquiryController@show');

Route::get('orders', 'OrderController@index');
Route::get('orders/{order}', 'OrderController@show');

Route::get('reservations', 'ReservationController@index');
Route::get('reservations/{reservation}', 'ReservationController@show');

Route::get('appointments', 'AppointmentController@index');
Route::get('appointments/{appointment}', 'AppointmentController@show');

Route::get('tests', 'TestController@index');
Route::get('tests/{test}', 'TestController@show');

Route::get('quotes', 'QuoteController@index');
Route::get('quotes/{quote}', 'QuoteController@show');

Route::get('reviews', 'ReviewController@index');
Route::get('reviews/{review}', 'ReviewController@show');
Route::post('reviews', 'ReviewController@store');

Route::get('category', 'CategoryController@index');
Route::get('category/{category}', 'CategoryController@show');
Route::get('get/category', 'CategoryController@getCategory');

Route::get('address', 'AddressController@index');
Route::get('address/{address}', 'AddressController@show');

Route::patch('users/{user}/archive','UserController@archive');
Route::patch('users/{user}/unarhive','UserController@unArchive');

Route::get('user/{reservation}/reservation', 'UserController@viewReservation');
Route::get('user/{quote}/quotation', 'UserController@viewQuotation');
Route::get('user/{inquiry}/inquiry', 'UserController@viewInquiry');
Route::get('user/{test}/request', 'UserController@viewRequest');
Route::get('user/{order}/order', 'UserController@viewOrder');
Route::get('user/{appointment}/appointment', 'UserController@viewAppointment');

Route::post('upload/vehicle', 'VehicleController@upload');

// Route::get('user/{user}/purchases', 'UserController@userPurchases');

Route::group(['middleware' => 'auth:api', 'throttle:1,120'], function() {
    Route::get('users/{user}/reservations', 'UserController@showReservations');
    Route::get('users/{user}/orders','UserController@showOrders');
    Route::get('users/{user}/appointments', 'UserController@showAppointments');
    Route::get('users/{user}/inquiries', 'UserController@showInquiry');
    Route::get('users/{user}/quotations', 'UserController@showQuotations');
    Route::get('users/{user}/requests', 'UserController@showRequests');
    Route::patch('products/{product}/units/add','ProductController@updateUnits');
    Route::patch('orders/{order}/deliver','OrderController@deliverOrder');
    Route::patch('category/{category}/archive','CategoryController@archiveCategory');
    Route::patch('category/{category}/unarchive','CategoryController@unarchiveCategory');
    Route::patch('vehicle/{vehicle}/archive', 'VehicleController@archiveVehicle');  
    Route::patch('vehicle/{vehicle}/unarchive', 'VehicleController@unarchiveVehicle');  
    Route::patch('appointments/{appointment}/approved', 'AppointmentController@setAppointment');
    Route::patch('reservations/{reservation}/approved','ReservationController@reserveCar');
    Route::patch('quotes/{quote}/accept','QuoteController@acceptQuote');
    Route::put('change/password/{user}', 'UserController@resetPass');
    Route::put('update/user/{user}', 'UserController@adminUpdateUser');
    Route::post('users/create/admin', 'UserController@createAdmin');
    Route::post('users/create/secretary', 'UserController@createSecretary');
    Route::post('users/create/manager', 'UserController@createManager');
    Route::post('users/upload/image', 'UserController@uploadImage');
    Route::post('galleries/upload/image', 'GalleryController@uploadGallery');
    Route::post('services/upload/image', 'ServiceController@uploadFile');
    Route::post('vehicle/upload/image', 'VehicleController@uploadVehicle');
    Route::post('vehicle/upload/multiple/image', 'VehicleController@uploadMultipleVehicle');
    Route::post('products/upload/image', 'ProductController@uploadProduct');
    Route::post('services/upload/image/{user}', 'ServiceController@uploadService');
    Route::post('reservations/upload/image', 'ReservationController@uploadImage');
    Route::post('category/upload/image', 'CategoryController@uploadBrand');
    Route::resource('users', 'UserController')->except(['index', 'show', 'destroy']);
    Route::resource('vehicle', 'VehicleController')->except(['index', 'show']);
    Route::resource('products', 'ProductController')->except(['index','show']);
    Route::resource('services', 'ServiceController')->except(['index', 'show']);
    Route::resource('galleries', 'GalleryController')->except(['index', 'show']);
    Route::resource('inquiries', 'InquiryController')->except(['index', 'show']);
    Route::resource('tests', 'TestController')->except(['index', 'show']);
    Route::resource('quotes', 'QuoteController')->except(['index', 'show']);
    Route::resource('cart', 'CartController')->except(['index', 'show']);
    Route::resource('reservations', 'ReservationController')->except(['index', 'show']);
    Route::resource('orders', 'OrderController')->except(['index', 'show']);
    Route::resource('appointments', 'AppointmentController')->except(['index', 'show']);
    Route::resource('category', 'CategoryController')->except(['index', 'show']);
    Route::resource('address', 'AddressController')->except(['index', 'show']);
    Route::resource('contacts', 'ContactController')->except(['index', 'show', 'store']);
});

