@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="./css/welcome.css">
@endpush

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center jumbotron mt-5">
            <div class="text-center">
                <h1>知恵の共有場所<br>USEFULへようこそ！</h1>

                {{-- ユーザー登録ページへのリンク --}}
                {!! link_to_route('signup.get', '登録', [], ['class' => 'btn btn-lg btn-primary mr-3 mt-5']) !!}
                {{-- ログインページへのリンク --}}
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary ml-3 mt-5']) !!}
            </div>
        </div>
    @endif
@endsection

