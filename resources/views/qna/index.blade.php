@extends('../layouts.app')

@section('content')

    <div class='container'>
        <h1>포럼 글 목록</h1>
        <hr/>
        <ul>
            @forelse($questions as $question)
                <li>
                    {{ $question->title }}
                    <small>
                        by {{ $question->user->name }}
                    </small>
                </li>
            @empty
                <p>글이 없습니다</p>
            @endforelse
        </ul>
    </div>
    @if($questions->count())
        <div class='text-center'>
            {!! $questions->render() !!}
        </div>
    @endif
    <p style="text-align: center"><a href="{{ route('qna.create') }}">질문하기</a></p>

@stop