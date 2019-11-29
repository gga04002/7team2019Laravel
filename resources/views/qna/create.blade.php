@extends('../layouts/app')

@section('content')

    <form action="route('store')" method="POST">
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
            <label for="titleLable">제목 : </label>
            <input type="text" name="title" id="title" value="{{ old('name') }}" class="form-control"/>
            {!! $errors->first('number', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
            <label for="contentLable">질문 내용 : </label>
            <textarea name="content" id="content" rows="10" class="form-control">{{ old('name') }}</textarea>
            {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">저장하기</button>
        </div>

    </form>


@stop