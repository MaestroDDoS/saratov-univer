@extends('pages.common.main-frame')
@section( 'head' )
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fias.css') }}">
@endsection
@section('content')
    @include( 'captcha' )
<section class="breadcrumbs-custom">
	@include('layouts.common.breadcrumbs', [ 'breadcrumbs' => [ [ 'common.shop' ] ] ])
</section>
	<section class="section section-sm bg-gray-14 text-md-left">
		<div class="container">
			<div class="row row-50">
				<div class="col-lg-8 pr-lg-4">
					@foreach( $items as $item )
						<div class="shopcart-product-card" product-id="{{ $item['id'] }}">
							<div class="product-figure-card">
								<a href="{{ route( 'common.shop.product', $item['id'] ) }}">
									<img src="{{ asset( "images/products/{$item['id']}/small.png" ) }}" alt="" width="128" height="128"/>
								</a>
							</div>
							<div class="shopcart-info-product">
								<h6 class="product-title"><a href="{{ route( 'common.shop.product', $item['id'] ) }}">{{ $item['name'] }}</a></h6>
								<div class="input-number">
									<button class="fl-bigmug-line-left148" type="button"></button>
									<input type="number" value="{{ $item['count'] }}" step="1" min="1" max="{{ $item['limit'] }}"/>
									<button  class="fl-bigmug-line-right154" type="button"></button>
								</div>
								<div class="shopcart-info-footer">
									<div class="shopcart-info-wrap">
										<p>{{ __( 'common.count_all' ) }}: <span group="{{ $item['group'] }}"></span> {{ __( 'notation.count' ) }}.</p>
										<p>{{ __( 'common.total_weight' ) }}: <span weight="{{ $item['weight'] * 0.001 }}"></span> {{ __( 'notation.kg' ) }}.</p>
									</div>
									<p><span price="{{ $item['cost'] }}"></span> ₽</p>
								</div>
							</div>
							<button class="shopcart-btn-remove"></button>
						</div>
					@endforeach
				</div>
				<div class="col-lg-4 shopcart-aside-panel">
					<div class="aside row-30 row-md-50 justify-content-md-between">
						<div class="shopcart-info">
							<h4 class="font-weight-medium">{{ __( 'common.new_order' ) }}</h4>
							<hr class="hr-gray-100">
							<div class="shopcart-empty-title">
								<h5 class="font-weight-medium text-transform-uppercase">{{ __( 'common.empty_cart' ) }}</h5>
								<a class="button button-lg button-primary button-zakaria" href="{{ route( 'common.shop' ) }}">{{ __( 'common.go2shop' ) }}</a>
							</div>
							@if( count( $items ) != 0 )
								<div class="group-md group-middle">
									<ul class="list list-shopcart-info">
										<li><span>{{ __( 'common.total' ) }}: </span><span><span id="shopcart-totalcount"></span> {{ __( 'common.products' ) }} <span id="shopcart-totalprice"></span> ₽</span></li>
										<li><span>{{ __( 'common.total_weight' ) }}: </span><span><span id="shopcart-totalweight"></span> {{ __( 'notation.kg' ) }}</span></li>
									</ul>
								</div>
								<div id="shopcart-aside-form">
									<small class="mt-30">{{ __( 'common.min_weight' ) }} {{ config( 'saratov.min_weight' ) }} {{ __( 'notation.kg' ) }}.</small>
									<hr class="hr-gray-100 mb-30">
									<h5 class="font-weight-light">{{ __( 'common.address_delivery' ) }}</h5>
									<form action="{{ url()->current() }}" class="rd-form mt-20" id="order-form">
										<div class="rd-form-fields">
											<div class="d-flex flex-column mb-30">
												<label class="radio-inline"><input name="registry-accept" checked value="" collapse="hide" type="radio">{{ __( 'common.pickup' ) }}</label>
												<label class="radio-inline"><input name="registry-accept" value="delivery" collapse="show" type="radio">{{ __( 'common.delivery' ) }}</label>
											</div>
											<div class="form-wrap shopcart-address-inputs" id="address-inputs">
												<div>
													<div class="form-group">
														<input type="text" class="form-control shadow-sm" id="aside-shopcart-input-region" 	 placeholder="{{ __( 'common.address.region' ) }}">
														<input type="text" class="form-control shadow-sm" id="aside-shopcart-input-city" 	 placeholder="{{ __( 'common.address.city' ) }}">
														<input type="text" class="form-control shadow-sm" id="aside-shopcart-input-street" 	 placeholder="{{ __( 'common.address.street' ) }}">
														<input type="text" class="form-control shadow-sm" id="aside-shopcart-input-building" placeholder="{{ __( 'common.address.building' ) }}">
													</div>
													<p id="address-title" class="mb-3"></p>
												</div>
											</div>
										</div>
										<div class="d-flex">
											<button class="button button-lg button-primary w-100 button-zakaria" type="submit"><span>{{ __( 'common.send_request' ) }}</span></button>
										</div>
									</form>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section( 'js' )
	<script src="{{ asset('js/cookie.min.js') }}"></script>
	<script src="{{ asset('js/fias.js') }}"></script>
	<script src="{{ asset('js/common/shopcart-controller.js') }}"></script>
	<script src="{{ asset('js/common/shop-cart.js') }}"></script>
@endsection
