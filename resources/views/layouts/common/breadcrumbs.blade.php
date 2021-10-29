<div class="breadcrumbs-custom-footer">
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="{{ route('common') }}">{{ __( 'navigation.common.index' ) }}</a></li>
            @isset($breadcrumbs)
                @foreach( $breadcrumbs as $cfg )
                    <li><a href="{{ route( $cfg[0], $cfg[1] ?? null ) }}">{{ __nav( $cfg[0], $cfg[1] ?? null ) }}</a></li>
                @endforeach
            @endisset
            <li class="active">{{ __( "navigation.$page" ) }}</a></li>
        </ul>
    </div>
</div>
