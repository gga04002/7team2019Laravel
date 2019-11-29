@extends('../layouts.app')

@section('content')

    <h1 style="text-align: center">이 곳은 QnA 페이지 입니다.</h1>
    <p style="text-align: center"><a href="{{ route('qna.create') }}">질문하기</a></p>

@stop