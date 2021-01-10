@extends('layouts.app')

@section('content')
    <h3>投稿作成ページ</h3>
    {!! Form::open(['route' => 'microposts.store']) !!}
        <div class="form-check form-check-inline">
            {!! Form::radio('category_id', 1) !!}
            {!! Form::label('category_id', '料理') !!}
        </div>

        <div class="form-check form-check-inline">
            {!! Form::radio('category_id', 2) !!}
            {!! Form::label('category_id', '掃除') !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', '内容') !!}
            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
        </div>
        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection


