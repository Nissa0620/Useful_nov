@if(count($microposts) >0 )
    <ul class="list-unstyled">
        @foreach ($microposts as $micropost)
            <li class="media mb-3 border border-dark pt-3">
                <aside class="ml-3 mr-3">
                    {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="mr-2 rounded" src="{{ Gravatar::get($micropost->user->email, ['size' => 50]) }}" alt="">
                    <div>
                        @if ($micropost->category_id == 1)
                            <p class="badge badge-success text-center">料理</p>
                        @elseif($micropost->category_id == 2)
                            <p class="badge badge-success text-center">掃除</p>
                        @elseif($micropost->category_id == 3)
                            <p class="badge badge-success text-center">買い物</p>
                        @else
                            <p class="badge badge-success text-center">その他</p>
                        @endif
                    </div>


                    <div>
                        @if (Auth::id() == $micropost->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </aside>
                <div class="media-body">
                    <div>
                        <p>{{ $micropost->user->name }}</p>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p>{!! nl2br(e($micropost->content)) !!}</p>
                    </div>
                    <div>
                        <span class="text-muted">投稿時間 {{ $micropost->created_at }}</span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif
