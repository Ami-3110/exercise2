@if ($paginator->hasPages())
    <nav class="pagination-wrapper" role="navigation" aria-label="Pagination Navigation">
        <ul class="pagination-list">
            {{-- 前のページリンク --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-disabled">&lt;</li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" class="pagination-link">&lt;</a></li>
            @endif

            {{-- ページ番号リンク --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="pagination-disabled">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="pagination-current">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- 次のページリンク --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" class="pagination-link">&gt;</a></li>
            @else
                <li class="pagination-disabled">&gt;</li>
            @endif
        </ul>
    </nav>
@endif