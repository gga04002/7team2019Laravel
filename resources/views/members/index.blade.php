@extends('../layouts/app')

@section('content')

    <ul>
        <h1 style="text-align: center">이 곳은 현지 조원소개 페이지 입니다.</h1>
        @forelse($members as $member)
            <li>{{ $member }}</li>
        @empty
            <p>조원이 등록되지 않았습니다.</p>
        @endforelse
        <p style="text-align: center"><a href="{{ route('members.create') }}">멤버 자료 추가</a></p>
    </ul>
@stop