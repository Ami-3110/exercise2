@if ($paginator->hasPages())
    <nav class="p-pagination">
        <ul>
        <!-- 前へ移動ボタン -->
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <img src="{{ asset('img/arrow-previous.svg') }}" class="p-pagination__previous" alt="<">
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}">
                    <img src="{{ asset('img/arrow-previous.svg') }}" class="p-pagination__previous" alt="<">
                </a>
            </li>
        @endif

        <!-- ページ番号　-->
        @foreach ($items as $item)
            @if (is_string($item))
                <li class="disabled">
                    {{ $item }}
                </li>
            @endif

            @if (is_array($item))
                @foreach ($item as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            {{ $page }}
                        </li>
                    @else
                        <li class="active">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- 次へ移動ボタン -->
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}">
                    <img src="{{ asset('img/arrow-next.svg') }}" class="p-pagination__next" alt=">">
                </a>
            </li>
        @else
            <li class="disabled">
                <img src="{{ asset('img/arrow-next.svg') }}" class="p-pagination__next" alt=">">
            </li>
        @endif
        </ul>
    </nav>
@endif 