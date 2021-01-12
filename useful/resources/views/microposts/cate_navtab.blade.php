<ul class="nav nav-tabs nav-justified">
    <li class="nav-item border border-dark">
        <a href="{{ route('microposts.index')}}" class="nav-link " class="nav-link">
            全て
        </a>
    </li>

    @foreach ($categories as $category)
    <li class="nav-item border border-dark">
        <a  href="{{ route('microposts.index', ['category_id' => $category->id]) }}" class="nav-link ">
            @if($category->id == 1)
                料理
            @elseif($category->id == 2)
                掃除
            @elseif($category->id == 3)
                買い物
            @else
                その他
            @endif
        </a>
    </li>
    @endforeach
</ul>
