<div class="pagination-wrap">
    <nav aria-label="Page navigation">
        <ul class="pagination" id="filter-pagination">
            <li page="prev" class="page-item page-item-control {{ !$paginator->onFirstPage() && $paginator->lastPage() != 1 ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><span class="icon"></span></a>
            </li>
                @for(
                    $i = 0,
                    $curpage = $paginator->currentPage(),
                    $half 	 = ceil( ( 9 - 1 ) * 0.5 ),
                    $idx 	 = max( $curpage - $half, 1 ) - ( $half - min( $half, $paginator->lastPage() - $curpage ) ),
                    $list 	 = $elements[0];
                    $i < 9;
                    $i++,
                    $idx++
                )
                    <li class="page-item {{ isset($list[$idx]) ? '' : 'disabled' }}">
                        <a class="page-link {{ $idx == $curpage ? 'active' : '' }}" href="{{ $list[$idx] ?? null }}">{{ $idx }}</a>
                    </li>
                @endfor
            <li page="next" class="page-item page-item-control {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><span class="icon"></span></a>
            </li>
        </ul>
    </nav>
</div>
