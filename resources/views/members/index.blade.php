@extends('../layouts.app')

@section('content')

    <h1 style="text-align: center">이 곳은 조원 소개 페이지 입니다.</h1>
    <p style="text-align: center"><a href="{{ route('members.create') }}">조원 추가</a></p>

@stop