@extends('layouts.app')

@section('content')
    <div class="center jumbotron mt-5">
        <div class="text-center">
            <h1>知恵の共有場所<br>USEFULへようこそ！</h1>
            {{-- ユーザー登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection

