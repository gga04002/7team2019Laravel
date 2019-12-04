<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function __constructor(){
        $this->middleware('guest');
    }

    public function execute(Request $request, $provider){
        // 쿼리 스트링에 code 필드가 없으면
        if(! $request->has('code')){
            return $this->redirectToProvider($provider);
        }
        // 쿼리 스트링에 code 필드가 있으면
        return $this->handleProviderCallback($provider);
    }

    public function redirectToProvider($provider){
        return \Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){
        // Laravel\Socialite\Two\User 인스턴스를 얻을 수 있음
        $user = \Socialite::driver($provider)->user();  

        $user = (\App\User::whereEmail($user->getEmail())->first())
            ?: \App\User::create([
                'name' => $user->getName() ?: 'unknown',
                'email' => $user->getEmail(),
                'activated' => 1,
            ]);
        
        auth()->login($user);
        flash(auth()->user()->name. '님 환영합니다.');

        return redirect('/');
    }
}
