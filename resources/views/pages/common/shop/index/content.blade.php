@extends('pages.common.main-frame')
@section('content')
<template id="item-ajax-template">
    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
        @include( "templates.$template", $template_params )
    </div>
</template>
<section class="breadcrumbs-custom">
	<div class="parallax-container" data-parallax-img="{{ asset('images/backgrounds/bg-shop.jpg') }}">
		<div class="breadcrumbs-custom-body parallax-content context-dark">
			<div class="container">
				<h2 class="breadcrumbs-custom-title">{{ __("navigation.$page") }}</h2>
			</div>
		</div>
	</div>
	@include('layouts.common.breadcrumbs')
</section>
<section class="section section-xxl bg-default text-md-left">
	<div class="shop-container px-sm-4 px-xxl-0">
		<div class="row row-50">
			<div class="col-lg-4 col-xl-3">
				<div class="aside row row-30 row-md-50 justify-content-md-between">
					<div class="aside-item col-sm-6 col-md-5 col-lg-12 mb-0">
						<div>
							<h6 class="aside-title">{{ __( 'common.cost' ) }}</h6>
							<div class="rd-range" data-min="{{ $cost[0] }}" data-max="{{ $cost[1] }}" data-min-diff="0" data-start="{{ "[".($cost[2]??$cost[0]).",".($cost[3]??$cost[1])."]" }}" data-step="1" data-tooltip="false" data-input=".rd-range-input-value-1" data-input-2=".rd-range-input-value-2"></div>
							<div class="group-xs group-justify">
								<div>
									<div class="rd-range-wrap">
										<div class="rd-range-title">{{ __( 'common.cost' ) }}:</div>
										<div class="rd-range-form-wrap">
											<input class="rd-range-input rd-range-input-value-1" filter="cost" filter-idx="0" type="text">
											<span>₽</span>
										</div>
										<div class="rd-range-divider"></div>
										<div class="rd-range-form-wrap">
											<input class="rd-range-input rd-range-input-value-2" filter="cost" filter-idx="1" type="text">
											<span>₽</span>
										</div>
									</div>
								</div>
							</div>
							<h6 class="aside-title">{{ __( 'common.weight' ) }}</h6>
							<div class="rd-range" data-min="{{ $weight[0] }}" data-max="{{ $weight[1] }}" data-min-diff="0" data-start="{{ "[".($weight[2]??$weight[0]).",".($weight[3]??$weight[1])."]" }}" data-step="50" data-tooltip="false" data-input=".rd-range-input-value-3" data-input-2=".rd-range-input-value-4"></div>
							<div class="group-xs group-justify">
								<div>
									<div class="rd-range-wrap">
										<div class="rd-range-title">{{ __( 'common.weight' ) }}:</div>
										<div class="rd-range-form-wrap">
											<input class="rd-range-input rd-range-input-value-3" filter="weight" filter-idx="0" type="text">
											<span>г</span>
										</div>
										<div class="rd-range-divider"></div>
										<div class="rd-range-form-wrap">
											<input class="rd-range-input rd-range-input-value-4" filter="weight" filter-idx="1" type="text">
											<span>г</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="rd-aside-shop-filter">
							<h6 class="aside-title">{{ __( 'product.partner' ) }}</h6>
							<ul class="list-shop-filter">
                                @php( $query_filter = $query_params[ 'partner' ] ?? [null] )
                                @foreach( $filter[ 'partner' ] as $idx => $cfg )
                                    @php( $type = $cfg[ 'name' ] ?? null )
                                    <li>
                                        <label class="checkbox-inline">
                                            <input
                                                filter="partner"
                                                filter-idx="{{ $idx }}"
                                                value="{{ $type }}"
                                                {{ in_array( $type, $query_filter ) ? 'checked' : '' }}
                                                type="checkbox"
                                            >
                                            {{ $cfg['company_name'] }}
                                        </label>
                                        <span class="list-shop-filter-number">({{ $cfg['products_count'] }})</span>
                                    </li>
                                @endforeach
							</ul>
						</div>
					</div>
					<div class="aside-item col-sm-6 col-lg-12">
						<div class="rd-aside-shop-filter">
							<h6 class="aside-title">{{ __( 'common.categories' ) }}</h6>
							<ul class="list-shop-filter">
                                @php( $query_filter = $query_params[ 'type' ] ?? [null] )
                                @foreach( $filter[ 'type' ] as $idx => $cfg )
                                    @php( $type = $cfg[ 'name' ] ?? null )
                                    <li>
                                        <label class="checkbox-inline">
                                            <input
                                                filter="type"
                                                filter-idx="{{ $idx }}"
                                                value="{{ $type }}"
                                                {{ in_array( $type, $query_filter ) ? 'checked' : '' }}
                                                type="checkbox"
                                            >
                                            {{ trans_fb( "product.type.$type", 'common.all' ) }}
                                        </label>
                                        <span class="list-shop-filter-number">({{ $cfg['products_count'] }})</span>
                                    </li>
                                @endforeach
							</ul>
						</div>
						<form action={{ url()->current() }}>
							<button class="button button-shop-filter button-primary button-zakaria w-100" type="filter"><span>{{ __( 'common.accept' ) }}</span></button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xl-9">
				<div class="product-top-panel group-md">
					<p class="product-top-panel-title" id="item-list-title">
                        @include( 'layouts.search_result', ['type' => 'products'] )
					</p>
					<div>
						<div class="group-sm group-middle">
							<div class="product-top-panel-sorting">
								<select filter="sort" ajax-reload class="select2">
									<option value="cost">{{ __( 'common.sorting.cost' ) }}</option>
									<option selected value="title">{{ __( 'common.sorting.a-z' ) }}</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="shop-products-list row row-30 row-lg-50" id="items-list-page">
                    @foreach( $paginator as $item )
                        <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
                            @include( "templates.$template", $item )
                        </div>
                    @endforeach
				</div>
				{{ $paginator->links( 'layouts.common.pagination' ) }}
			</div>
		</div>
	</div>
</section>
@endsection
@section( 'js' )
	<script src="{{ asset('js/cookie.min.js') }}"></script>
	<script src="{{ asset('js/common/shopcart-controller.js') }}"></script>
	<script src="{{ asset('js/common/shop.js') }}"></script>
@endsection
