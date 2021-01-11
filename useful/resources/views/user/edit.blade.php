@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>編集しよう！</h1>
    </div>

    {!! Form::open(['route' => ['users.update', Auth::user()->name], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="form-group">
                {!! Form::label('name', '名前') !!}
                {!! Form::text('name', $username, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('編集完了', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
