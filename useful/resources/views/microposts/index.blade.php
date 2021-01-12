@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row mt-5">
            <aside class="col-sm-4">
                    <div class="#">
                        {{-- 認証済みユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded-circle img-fluid border border-dark" src="{{ Gravatar::get(Auth::user()->email, ['size' => 200]) }}" alt="">
                    </div>
                <div class="toukou">
                    {{--  投稿ページへのリンク --}}
                    {!! link_to_route('microposts.create', '投稿する', [], ['class' => 'btn btn-lg btn-primary mt-5']) !!}
                </div>
                <div class="edit">
                    {!! link_to_route('users.edit', 'プロフィール編集', ['user' => Auth::user()->name], ['class' => 'btn btn-primary btn-lg mt-5']) !!}
                </div>
            </aside>
            <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('microposts.cate_navtab')
                @include('microposts.microposts')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection
