<?php

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


Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => 'auth'], function () {
		Route::get('/home', 'HomeController@index')->name('home');
    });
});

Route::get('lang/{lang}', function($lang){
	if (array_key_exists($lang, Config::get('languages'))) {
		Session::put('applocale', $lang);
	}
	return Redirect::back();
})->name('setlange');

include 'media.php';
include 'user.php';
include 'groupe.php';