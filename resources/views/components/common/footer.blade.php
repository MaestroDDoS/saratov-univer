<footer class="section footer-modern">
    <div class="footer-modern-body section-xl">
        <div class="container">
            <div class="row row-40 row-md-50 justify-content-xl-between">
                <div class="col-md-10 col-lg-3 col-xl-4 wow fadeInRight">
                    <div class="inset-xl-right-70 block-1">
                        <h5 class="footer-modern-title"><a href="{{ route('common.gallery') }}">{{ __('navigation.common.gallery') }}</a></h5>
                        <div class="row row-10 gutters-10" data-lightgallery="group">
                            @foreach( $gallery as $image )
                                <div class="col-4 col-sm-2 col-lg-4">
                                    <a class="thumbnail-minimal" href="{{ $image[0] }}" data-lightgallery="item">
                                        <img data-src="{{ $image[1] }}" alt="" width="93" height="93"/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-7 col-lg-5 wow fadeInRight" data-wow-delay=".1s">
                    <h5 class="footer-modern-title">{{ __('navigation.navigation' ) }}</h5>
                    <ul class="footer-modern-list footer-modern-list-2 d-sm-inline-block d-md-block">
                        @foreach( $nav_links as $cfg )
                            <li><a href="{{ $cfg[0] }}">{{ __("navigation.$cfg[1]") }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
                    <h5 class="footer-modern-title">{{ __('navigation.contact_info') }}</h5>
                    <ul class="contacts-creative">
                        <li>
                            <div class="unit unit-spacing-sm flex-column flex-md-row">
                                <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                                <div class="unit-body"><a href="#">410080, Россия, Саратов<br/>Сокурский тракт, 1</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="unit unit-spacing-sm flex-column flex-md-row">
                                <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                                <div class="unit-body"><a href="tel:{{ config('saratov.phone_main') }}">{{ config('saratov.phone_main') }}</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="unit unit-spacing-sm flex-column flex-md-row">
                                <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                                <div class="unit-body"><a href="mailto:{{ config('saratov.mail_main') }}">{{ config('saratov.mail_main') }}</a></div>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-inline list-social-3 list-inline-sm">
                        @foreach ( config('saratov.official_links') as $type => $link )
                            <li><a class="icon mdi mdi-{{ $type }} icon-xxs" href="{{ $link }}"></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</footer>
