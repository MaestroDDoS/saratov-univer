<div class="col-lg-4 col-xl-3">
    <div class="aside row row-30 row-md-50 justify-content-md-between">
        <div class="aside-item col-sm-6 col-md-5 col-lg-12">
            <h6 class="aside-title">{{ __( "common.sections" ) }}</h6>
            <ul class="list-categories list-categories-without-flex">
                @foreach( $nav_links as $cfg )
                    <li><a class="{{ $page != $cfg[1] ? '' : 'active' }}" href="{{ $cfg[0] }}">{{ __("navigation.$cfg[1]") }}</a></li>
                @endforeach
            </ul>
        </div>
        <x-common.latest-news/>
    </div>
</div>
