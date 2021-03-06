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
Route::get('/admin','Controller@adminPersonal')->name('adminPersonal.show');

Route::post('/personal/{name}/resetPassword','Controller@resetPassword')->name('resetPassword');

Route::post('/search','SearchController@index')->name('search');
Route::get('/search/{name}/{type}','SearchController@categories')->name('分類');

Route::get('/course/{courseNo}','Controller@course')->name('course');

Route::resource('exp','expController');
Route::resource('comment','commentController');
Route::resource('reply','replyController');

Route::get('/editExp/{expNo}', 'Controller@editExp')->name('editExp');


Route::get('download',function(){
    return response()->download(realpath(base_path('public')).'/推課海大_期末報告.pptx', '推課海大_期末報告.pptx');
});
