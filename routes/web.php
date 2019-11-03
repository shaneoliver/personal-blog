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
    return view('welcome');
});

Auth::routes(
    ['register' => false]
);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController')->name('about.index');
Route::get('/projects', 'ProjectController@index')->name('projects.index');
Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::post('/contact', 'ContactController@store')->name('contact.store');

Route::get('/articles', 'ArticleController@index')->name('articles.index');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/articles/create', 'ArticleController@create')->name('articles.create');
    Route::post('/articles', 'ArticleController@store')->name('articles.store');
});
Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');
