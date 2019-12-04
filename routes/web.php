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

// 메인페이지에 CRUD 안할거니까 리소스 컨트롤러 삭제함
//Route::resource('/', 'MainpageController');

Route::get('/', 'MainController@index')->name('Mainpage');

Route::resource('/japan', 'JapanController');

Route::resource('/members', 'MembersController');

Route::resource('/qna', 'QnAController');

/* Social Login */
Route::get('social/{provider}', [
    'as' => 'social.login',
    'uses' => 'SocialController@execute',
]);