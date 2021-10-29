<aside class="sidebar-menu h-100">
    <div class="sidebar-header">
        <h4><a href="{{ route( 'common' ) }}">Sarmol</a></h4>
    </div>
    <div class="sidebar-menu-inner h-100">
        <div>
            <ul>
                @foreach( $nav_links[ 'list' ] as $list )
                    <li class="{{ $page != $list[1] ? '' : 'active' }}">
                        <a href="{{ $list[0] }}">
                            <i class="fl-bigmug-line-{{ $list[2] }}">
                                @if( $count = $list[3] ?? null )
                                    <span>{{ $count }}</span>
                                @endif
                            </i>
                            <span>{{ __( "navigation.{$list[1]}" ) }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        @isset( $nav_links[ 'alts' ] )
            <div class="mt-4 dashboard-aside-other">
                <ul>
                    @foreach( $nav_links[ 'alts' ] as $list )
                        <li class="{{ $page != $list[1] ? '' : 'active' }}">
                            <a href="{{ $list[0] }}">
                                <i class="fl-bigmug-line-{{ $list[2] }}">
                                    @if( $count = $list[3] ?? null )
                                        <span>{{ $count }}</span>
                                    @endif
                                </i>
                                <span>{{ __( "navigation.{$list[1]}" ) }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endisset
    </div>
</aside>
