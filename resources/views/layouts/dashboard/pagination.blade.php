<div>
    @php( $last_page   = $paginator->lastPage() )
    @php( $prev_enable = !$paginator->onFirstPage() && $last_page != 1 )
    <ul class="dashboard-pagination" id="filter-pagination">
        <li page="first" class="{{ $prev_enable ? '' : 'disabled' }}">
            <a class="fl-bigmug-line-two319" href="{{ $paginator->url( 1 ) }}"></a>
        </li>
        <li page="prev" class="{{ $prev_enable ? '' : 'disabled' }}">
            <a class="fl-bigmug-line-left148" href="{{ $paginator->previousPageUrl() }}"></a>
        </li>
            @for(
                $i = 0,
                $curpage = $paginator->currentPage(),
                $half 	 = ceil( ( 5 - 1 ) * 0.5 ),
                $idx 	 = max( $curpage - $half - ( $half - min( $half, $last_page - $curpage ) ), 1),
                $list 	 = $elements[0];
                $i < 5;
                $i++,
                $idx++
            )
                <li class="{{ isset($list[$idx]) ? '' : 'disabled' }}">
                    <a class="page-btn {{ $idx != $curpage ? '' : 'active' }}" href="{{ $list[$idx] ?? null }}">{{ $idx }}</a>
                </li>
            @endfor
        <li page="next" class="{{ $curpage < $last_page ? '' : 'disabled' }}">
            <a class="fl-bigmug-line-right154" href="{{ $paginator->nextPageUrl() }}"></a>
        </li>
        <li page="last" class="{{ $last_page != 1 ? '' : 'disabled' }}">
            <a class="fl-bigmug-line-double98" href="{{ $paginator->url( $last_page ) }}"></a>
        </li>
    </ul>
</div>

