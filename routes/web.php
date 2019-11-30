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

Route::get('/', 'SiteController@index')->name('site_index');
Route::post('/search', 'SiteController@search')->name('site_search');
Route::get('/show/{id}', 'SiteController@show')->name('site_show');



Route::get('/admin/home', 'HomeController@index')->name('admin_home');

Route::group(['prefix' => 'admin'], function() {
    Route::resource('faq', 'FAQController');
});