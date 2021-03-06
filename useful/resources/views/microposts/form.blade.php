@extends('layouts.app')

@section('content')
    <h3 class="mt-5 mb-4">投稿作成ページ</h3>
    {!! Form::open(['route' => 'microposts.store']) !!}
        <div class="form-check form-check-inline">
            {!! Form::radio('category_id', 1) !!}
            {!! Form::label('category_id', '料理') !!}
        </div>

        <div class="form-check form-check-inline">
            {!! Form::radio('category_id', 2) !!}
            {!! Form::label('category_id', '掃除') !!}
        </div>

        <div class="form-check form-check-inline">
            {!! Form::radio('category_id', 3) !!}
            {!! Form::label('category_id', '買い物') !!}
        </div>

        <div class="form-check form-check-inline">
            {!! Form::radio('category_id', 4) !!}
            {!! Form::label('category_id', 'その他') !!}
        </div>

        <div class="form-group mt-3">
            {!! Form::label('content', '内容') !!}
            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
        </div>
        {!! Form::submit('投稿', ['class' => 'btn btn-primary mt-2']) !!}
    {!! Form::close() !!}
@endsection


