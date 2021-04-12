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

Route::get('/', 'PageController@home');
Route::get('/home', 'PageController@home')->name('home');
Route::post('/register','PageController@register');

// view flower
Route::post('/searchflower','PageController@searchflower');
Route::get('/viewcflower/{id}','PageController@viewcflower');
Route::get('/viewdetailflower/{id}','PageController@viewdetailflower');

// cart & transaction
Route::group(['middleware' => 'auth'], function(){
	Route::get('/viewcart','PageController@viewcart');
	Route::post('/cartupdate','PageController@cartupdate');
	Route::post('/addcart','PageController@addcart');
	Route::get('/cartcheckout','PageController@checkout');
	Route::get('/viewhistory','PageController@viewhistory');
	Route::get('/viewhistorydetail/{id}','PageController@viewdetailhistory');
});

//update password
Route::group(['middleware' => 'auth', 'manager'], function(){
	Route::get('/viewchangepassword','PageController@viewchangepassword');
	Route::post('/updatepassword','PageController@updatepassword');
});


// manager
Route::group(['middleware' => 'manager'], function(){
	Route::get('/flowerupdate/{id}','PageController@flowerupdate');
	Route::get('/flowerdelete/{id}','PageController@flowerdelete');
	Route::get('/viewinsertflower','PageController@viewinsertflower');
	Route::get('/viewmanagecategory','PageController@viewmanagecategory');
	Route::get('/categoryupdate/{id}','PageController@viewupdatecategory');
	Route::get('/categorydelete/{id}','PageController@categorydelete');

	Route::post('/updateflower','PageController@updateflower');
	Route::post('/updatecategory','PageController@updatecategory');
	Route::post('/insertflower','PageController@insertflower');
});










