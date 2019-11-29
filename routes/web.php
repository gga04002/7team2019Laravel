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


Route::resource('/', 'MainpageController');

Route::get('/', 'MainpageController@index')->name('Mainpage');

Route::resource('/japan', 'JapanController');

Route::resource('/members', 'MembersController');

Route::resource('/qna', 'QnAController');

/*

Route::get('/', function () {
    if( auth()->check() ){
        $email = auth()->user()->email; 
        return view('mainpage', [ 'email' => $email ]);
    }
    else{
        return view('mainpage', [ 'email' => '-' ]);
    }
});

//헤더부분에서 필요
Route::get('/HH', 'HHController@index')->name('HH');
Route::get('/Introduce', 'IntroduceController@index')->name('Introduce');
Route::get('/QnA', 'QnAController@index')->name('QnA');

*/
