@extends('pages.dashboard.main-frame')
@section( 'content' )
<div class="order-single-panel" id="order-form">
    <div class="dashboard-table-title-white">
        <h4>{{ __( "dashboard.info_order" ) }}</h4>
        <span>№{{ $order->id }}</span>
    </div>
    <div class="order-single-info">
        <div class="col-md-6 mb-3 mb-md-0">
            <p>{{ __( "common.total" ) }}: <span id="shopcart-totalcount"></span> {{ __( "common.products" ) }} <span id="shopcart-totalprice">{{ number_format($order->cost, 0, ',', ' ') }}</span> ₽</p>
            <p>{{ __( "common.total_weight" ) }}: <span id="shopcart-totalweight">{{ number_format($order->weight, 1, ',', ' ') }}</span> {{ __( "notation.kg" ) }}</p>
            <h5>{{ __( "common.address_delivery" ) }}</h5>
            @if( $delivery = $order->delivery )
                <p>регион/обл. {{ $delivery["region"] }}</p>
                <p>г. {{ $delivery["city"] }}</p>
                <p>ул. {{ $delivery["street"] }} д. {{ $delivery["building"] }}</p>
                <p class="mt-3">
                    {{ __( "dashboard.delivery_cost" ) }}:
                    <span>
                        {{ isset( $delivery[ "cost" ] ) ? number_format($delivery[ "cost" ], 1, ',', ' ')." ₽" : __( "dashboard.specified" ) }}
                    </span>
                </p>
            @else
                <p>{{ __( "common.pickup" ) }}</p>
            @endif
        </div>
        <div class="col-md-6 text-md-right">
            <p class="status">
                <span class="{{ $order->order_status->name }}">&bull;</span>
                {{ __( "order.status.{$order->order_status->name}" ) }}
            </p>
        </div>
    </div>
    <div class="order-single-products-list">
        @php( $total_count = 0 )
        @foreach( $order->products as $product )
            @php( $cost   = $product->info->cost )
            @php( $weight = $product->weight * 0.001 )
            @php( $group  = $product->group )
            @php( $count  = $product->info->count )
            @php( $total_count += $count * $group )
            <div class="dashboard-product-card">
                <div class="product-img-wrap">
                    <img src="{{ asset( "images/products/{$product->id}/small.png" ) }}" alt="" width="96" height="96">
                </div>
                <div class="product-info-line-wrap">
                    <div class="d-sm-flex align-items-center">
                        <h6 class="dashboard-product-title">
                            <a href="{{ route( "common.shop.product", $product->id ) }}">
                                {{ $product->title }}
                            </a>
                        </h6>
                        <p class="ml-sm-auto">[ x {{ $count }} ]</p>
                    </div>
                    <div class="dashboard-product-info-line flex-column flex-sm-row">
                        <div class="col-sm-5">
                            <p>{{ __( "product.characteristic.group" ) }}: <span>{{ $group }} {{ __( "notation.count" ) }}</span></p>
                            <p>{{ __( "common.count_all" ) }}: <span>{{ $count * $group }} {{ __( "notation.count" ) }}</span></p>
                        </div>
                        <div class="col-sm-3 mt-2 mt-sm-0">
                            <p>{{ __( "product.characteristic.weight" ) }} {{ __( "notation.item" ) }}: <span>{{ $weight * 1000 }} {{ __( "notation.g" ) }}</span></p>
                            <p>{{ __( "common.cost" ) }}: <span>{{ $cost }} ₽</span></p>
                        </div>
                        <div class="col-sm d-flex mt-2 mt-sm-0">
                            <div class="ml-sm-auto">
                                <p>{{ __( "common.total_weight" ) }}: <span>{{ number_format($count * $group * $weight, 1, ',', ' ') }} {{ __( "notation.kg" ) }}</span></p>
                                <p>{{ __( "dashboard.cost" ) }}: <span>{{ number_format($count * $group * $cost, 1, ',', ' ') }} ₽</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div total-count="{{ $total_count }}"></div>
    </div>
    <div class="order-single-footer d-flex">
        @if( $order->canRemove() )
            <x-dashboard.modal-window name="order" :id="$order->id"/>
            <button type="button" class="btn btn-primary ml-0" data-toggle="modal" data-target="#modal-accept">
                <i class="fl-bigmug-line-cross81"></i><span>{{ __( "dashboard.remove" ) }}</span>
            </button>
        @endif
        @if( $order->needPayment() )
            <button type="button" class="btn btn-primary ml-auto">
                <i class="fl-bigmug-line-wallet26"></i><span>{{ __( "dashboard.pay" ) }}</span>
            </button>
        @endif
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/dashboard/user/order.js') }}"></script>
    <script src="{{ asset('js/dashboard/modal-window.js') }}"></script>
@endsection
