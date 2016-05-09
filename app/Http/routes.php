<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login',['usernotfound' => false , 'password_doesnt_match' => false]);
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/contract_cleaning', 'ContractController@openContractCleaningView');

Route::get('/help', function () {
    return view('help');
});

Route::get('/test', function () {
    return view('test2');
});

Route::get('/checkout', function () {
    return view('checkout');
});

// registering a new user
Route::post('/addUser', 'UserController@addUser');

// authentication a user
Route::post('/doLogin', 'UserController@doLogin');

// 
Route::post('/addContract', 'ContractController@addContract');

Route::post('/toCheckout', 'ContractController@toCheckout');

//logging out a user
Route::get('/doLogout', 'UserController@doLogout');



