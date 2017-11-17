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

Route::get('/', function () {
    return view('user/list');
});

Route::resource('quest', 'QuestController');

Route::resource('shop', 'ShopController');

Route::get('product/{id}', 'ShopController@getProduct');

Route::resource('teams', 'TeamController');