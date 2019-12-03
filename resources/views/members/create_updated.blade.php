@extends('../layouts.app')

@section('content')

    <form action="{{ route('members.store') }}" method="POST">
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="nameLable">이름 : </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"/>
            {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
            <label for="numberLable">학번 : </label>
            <input type="text" name="number" id="number" value="{{ old('name') }}" class="form-control"/>
            {!! $errors->first('number', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
            <label for="contentLable">하고 싶은 말 : </label>
            <textarea name="content" id="content" rows="10" class="form-control">{{ old('name') }}</textarea>
            {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">저장하기</button>
        </div>

    </form>


@stop