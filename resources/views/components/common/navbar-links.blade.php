<div class="rd-navbar-nav-wrap">
    <ul class="rd-navbar-nav">
        @foreach( $nav_links["main"] as $cfg )
            <li class="rd-nav-item {{ $page != $cfg[1] ? '' : 'active' }}">
                <a class="rd-nav-link" href="{{ $cfg[0] }}">
                    {{ __("navigation.$cfg[1]") }}
                </a>
            </li>
        @endforeach
        <li class="rd-nav-item"><a class="rd-nav-link" href="#">{{ __('navigation.navigation') }}</a>
            <ul class="rd-menu rd-navbar-dropdown">
                @foreach( $nav_links["dropdown"] as $cfg )
                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ $cfg[0] }}">{{ __("navigation.$cfg[1]") }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>
<div class="rd-navbar-main-element">
    <div class="rd-navbar-search rd-navbar-search-2">
        <button class="rd-navbar-search-toggle rd-navbar-fixed-element-3" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
        <form class="rd-search" action="">
            <div class="form-wrap">
                <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text"/>
                <label class="form-label" for="rd-navbar-search-form-input">{{ __('common.search') }}...</label>
                <div class="rd-search-results-live" id="rd-search-results-live"></div>
                <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
            </div>
        </form>
    </div>
    <div class="rd-navbar-basket-wrap rd-navbar-fixed-element-cardwrap">
        <button class="rd-navbar-basket rd-navbar-fixed-element-2 fl-bigmug-line-shopping202" data-rd-navbar-toggle=".cart-inline">
            <span>{{$shopcart_items_count}}</span>
        </button>
        <div class="cart-inline shopcart">
            <div id="basket-goto" class="{{ $shopcart_items_count ? '' : 'd-none' }}">
                <div class="cart-inline-header">
                    <h5 class="cart-inline-title m-0 text-center">{{ __('common.items_added') }}: <span>{{$shopcart_items_count}}</span></h5>
                </div>
                <div class="cart-inline-footer">
                    <div class="d-flex justify-content-center">
                        <a class="button button-primary button-zakaria" href="{{ route('common.shop.cart') }}">{{ __('common.go2cart') }}</a>
                    </div>
                </div>
            </div>
            <div id="basket-empty" class="{{ $shopcart_items_count ? 'd-none' : '' }}">
                <div class="cart-inline-header">
                    <h5 class="cart-inline-title text-center m-0">{{ __('common.empty_cart') }}</h5>
                </div>
            </div>
        </div>
    </div>
    @auth
        <a class="rd-navbar-basket fl-bigmug-line-user144 rd-navbar-fixed-element-4" href="{{ route('dashboard.user.orders') }}"></a>
    @else
        <button class="rd-navbar-basket fl-bigmug-line-user144 rd-navbar-fixed-element-4" type="button" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate"></button>
    @endauth
</div>
@guest
    @include('layouts.auth-form')
@endguest
