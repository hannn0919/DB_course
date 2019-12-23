<?php
use Illuminate\Foundation\Auth\User;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/logout', function(){
    if(Auth::check())   Auth::logout();
    return redirect('/');
});

Route::get('/personal/{name}','Controller@personal')->name('personal.show');

Route::post('/search','SearchController@index')->name('search');
Route::get('/search/{name}/{type}','SearchController@categories')->name('分類');

Route::get('/course/{courseNo}','Controller@course')->name('course');

Route::resource('exp','expController');
