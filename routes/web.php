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

Route::get('/logged', 'LoggedController@index')->name('logged');
