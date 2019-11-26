<?php



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

//헤더부분에서 필요
Route::get('/HH', 'HHController@index')->name('HH');
Route::get('/Introduce', 'IntroduceController@index')->name('Introduce');
Route::get('/QnA', 'QnAController@index')->name('QnA');
