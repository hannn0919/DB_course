<?php
use Illuminate\Foundation\Auth\User;
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

Route::get('/test',function(){
    $users=DB::select('select * from course where Department = "環境生物與漁業科學學系"');
    
    return $users;
});

Route::get('/home', 'HomeController@index');

Route::get('/exp/expNo',function(){
       
})->name('expNo');

Route::get('/comment/{comment?}',function($comment){
    return $comment;
});

Auth::routes();

Route::get('/logout', function(){
    if(Auth::check())   Auth::logout();
    return redirect('/');
});

Route::get('/personal/{name}','Controller@personal');

Route::get('/addExp','Controller@addExp');

Route::POST('/search','SearchController@index')->name('search');
/*Route:get('/search',[
    'uses'=>'SearchController',
    'as'=>'search'
]);*/

Route::get('/search/資工系','SearchController@one')->name('search/資工系');
Route::get('/search/通識','SearchController@two')->name('search/通識');
Route::get('/search/體育','SearchController@three')->name('search/體育');
Route::get('/search/語文','SearchController@four')->name('search/語文');

Route::get('/course/{courseNo}','Controller@course')->name('course');
