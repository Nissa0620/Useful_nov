<ul class="nav nav-tabs nav-justified">
    <li class="nav-item border border-dark">
        <a href="{{ route('microposts.index')}}" class="nav-link cate">
            全て
        </a>
    </li>

    @foreach ($categories as $category)
    <li class="nav-item border border-dark">
        @if($category->id == 1)
            <a  href="{{ route('microposts.index', ['category_id' => $category->id]) }}" class="nav-link cate cooking">
                料理
            </a>
        @elseif($category->id == 2)
            <a  href="{{ route('microposts.index', ['category_id' => $category->id]) }}" class="nav-link cate cleaning">
                掃除
            </a>
        @elseif($category->id == 3)
            <a  href="{{ route('microposts.index', ['category_id' => $category->id]) }}" class="nav-link cate shopping">
                買い物
            </a>
        @else
            <a  href="{{ route('microposts.index', ['category_id' => $category->id]) }}" class="nav-link cate catesonota">
                その他
            </a>
        @endif
    </li>
    @endforeach
</ul>
