<div class="aside-item col-sm-6 col-md-5 col-lg-12">
    <h6 class="aside-title">{{ __( 'common.sections' ) }}</h6>
    <ul class="list-categories">
        @foreach( $nav_links as $cfg )
            <li>
                <a
                    class="{{ $current_category != $cfg[0] ? '' : "active" }}"
                    filter="category"
                    value="{{ $cfg[0] }}"
                    href = "{{ route( 'common.blog', [ 'category' => $cfg[0] ] ) }}"
                >
                    {{ trans_fb("blog.categories.$cfg[0]", 'common.all') }}
                </a>
                <span class="list-categories-number">({{ $cfg[1] }})</span>
            </li>
        @endforeach
    </ul>
</div>
