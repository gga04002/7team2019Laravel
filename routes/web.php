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

Route::get('/', function () {
    if( auth()->check() ){
        $email = auth()->user()->email; 
        return view('mainpage', [ 'email' => $email ]);
    }
    else{
        return view('mainpage', [ 'email' => '-' ]);
    }
});

Route::get('/logged', 'LoggedController@index')->name('logged');

Route::resource('/galleries', 'GalleriesController');

Route::resource('/group', 'GroupController');

Route::resource('/qna', 'QnAController');
