@extends('pages.common.main-frame')
@section('content')
<section class="breadcrumbs-custom">
	@include( 'layouts.common.breadcrumbs', [ 'breadcrumbs' => [ [ 'common.shop' ] ] ])
</section>
<section class="section section-sm bg-default">
	<div class="container">
		<div class="row row-30">
			<div class="col-lg-6 d-flex justify-content-center">
				<img class="single-product-img" src="{{ asset( "images/products/{$id}/full.png" ) }}"/>
			</div>
			<div class="col-lg-6">
				<div class="single-product" product-id="{{ $id }}">
					<h3 class="font-weight-medium">{{ $name }}</h3>
					<div class="group-md group-middle">
						<div class="single-product-price">{{ $cost }} ₽</div>
					</div>
					<hr class="hr-gray-100">
					<div class="group-md group-middle">
						<ul class="list list-description">
							<li><span>{{ __('product.characteristic.partner') 	  }}:</span><a href="{{ route( 'common.shop', [ 'partner' => $partner ] ) }}">{{ $partner_name }}</a></li>
							<li><span>{{ __('product.characteristic.type') 		  }}:</span><a href="{{ route( 'common.shop', [ 'type' => $type ] ) }}">{{ __("product.type.$type") }}</a></li>
							<li><span>{{ __('product.characteristic.fat') 		  }}:</span><span><span>{{ $fat }}</span>%</span></li>
							<li><span>{{ __('product.characteristic.weight') 	  }}:</span><span><span>{{ $weight }}</span>{{ __( 'notation.g' ) }}</span></li>
							<li><span>{{ __('product.characteristic.group') 	  }}:</span><span><span>{{ $group }}</span>{{ __( 'notation.count' ) }}</span></li>
							<li><span>{{ __('product.characteristic.pack') 		  }}:</span><span><span>{{ $pack }}</span></span></li>
							<li><span>{{ __('product.characteristic.temperature') }}:</span><span><span>{{ $temperature }}±2</span>°С</span></li>
							<li><span>{{ __('product.characteristic.life_time')   }}:</span><span><span>{{ $life_time }}</span>{{ __( 'notation.days' ) }}</span></li>
						</ul>
					</div>
					<hr class="hr-gray-100">
					<div class="group-xs group-middle">
						<div class="product-stepper">
							<div class="stepper">
								<input class="form-input stepper-input" type="number" value="1" step="1" min="1" max="{{ $limit }}">
								<span class="stepper-arrow up"></span>
								<span class="stepper-arrow down"></span>
							</div>
						</div>
						<div>
							<button id="btn-add2card" class="button button-lg button-primary button-zakaria">{{ __('common.add2cart') }}</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section( 'js' )
	<script src="{{ asset('js/cookie.min.js') }}"></script>
	<script src="{{ asset('js/common/shopcart-controller.js') }}"></script>
	<script src="{{ asset('js/common/single-product.js') }}"></script>
@endsection

