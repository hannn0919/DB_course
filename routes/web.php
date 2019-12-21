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

Route::get('/personal/{name}','Controller@personal')->name('personal.show');
//$url=route('personal.show',['Hannn'=>$name]);

Route::get('/addExp','Controller@addExp');

Route::post('/search','SearchController@index')->name('search');
/*Route:get('/search',[
    'uses'=>'SearchController',
    'as'=>'search'
]);*/

Route::get('/search/{name}/{type}','SearchController@categories')->name('分類');

Route::get('/course/{courseNo}','Controller@course')->name('course');