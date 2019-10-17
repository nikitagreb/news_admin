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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::namespace('Api')->group(function () {
    Route::get('/categories', 'CategoryController@getList')->name('categories');
    Route::get('/news/{cnt}/{categoryId?}', 'NewsController@getList')
        ->name('news')
        ->where(['cnt' => '\d+', 'categoryId' => '\d+']);
});
