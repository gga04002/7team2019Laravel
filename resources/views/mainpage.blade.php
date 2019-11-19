<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SM_Project</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/navigation.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="navigation">
            <ul>
                @auth
                    @if ( Auth::user()->email == 'SM@naver.com')
                        <li class="li-item">
                            <a href="https://www.daum.net"> 현지 학기제 </a>
                        </li>
                        <li class="li-item">
                            <a href="https://www.naver.com"> 조원 소개 </a>
                        </li>
                        <li class="li-item">
                            <a href="https://blog.laravel.com">조원 셋팅</a>
                        </li>
                        <li class="li-item">
                            <a href="https://www.naver.com"> 질의 응답 </a>
                        </li>
                        <li class="li-item">
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                        </li>
                    @else
                    <li class="li-item">
                        <a href="https://blog.laravel.com">현지학기제</a>
                    </li>
                    <li class="li-item">
                        <a href="https://blog.laravel.com">조원 소개</a>
                    </li>
                    <li class="li-item">
                        <a href="https://blog.laravel.com">질의 응답</a>
                    </li>
                    <li class="li-item">
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </li>
                    @endif
                @else
                    <li class="li-item">
                        <a href="https://www.daum.net"> 현지 학기제 </a>
                    </li>
                    <li class="li-item">
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="li-item">
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </body>
</html>
