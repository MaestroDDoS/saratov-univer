@extends('pages.dashboard.main-frame')
@section( 'content' )
<x-dashboard.modal-window name="order" :id="$order->id"/>
<form action="{{ route( "dashboard.admin.orders.update", $order->id ) }}" class="order-single-panel" id="order-form">
    <div class="dashboard-table-title-white">
        <h4>Информация о заказе</h4>
        <span>№{{ $order->id }}</span>
    </div>
    <div class="order-single-info">
        <div class="col-md-6 mb-3 mb-md-0">
            <p>Итого: <span id="shopcart-totalcount"></span> товаров на <span id="shopcart-totalprice">{{ number_format($order->cost, 0, ',', ' ') }}</span> ₽</p>
            <p>Общий вес: <span id="shopcart-totalweight">{{ number_format($order->weight, 1, ',', ' ') }}</span> кг</p>
            <small class="mt-3"><span>Требования к заказу: минимальный вес 3000 кг.</span></small>
        </div>
        <div class="col-md-6 text-md-right">
            <p class="status">
                <select name="order_status_id" class="custom-form-control-static-width">
                    @foreach( $status_list as $status )
                        <option {{ $order->order_status_id != $status->id ?: "selected" }} value="{{ $status->id }}">
                            {{ __( "order.status.{$status->name}" ) }}
                        </option>
                    @endforeach
                </select>
            </p>
        </div>
        <div class="col px-0 d-md-flex mt-2 justify-content-md-between">
            <div class="col-md-6">
                <h5>Адрес доставки</h5>
                @if( $delivery = $order->delivery )
                    <p>регион/обл. {{ $delivery["region"] }}</p>
                    <p>г. {{ $delivery["city"] }}</p>
                    <p>ул. {{ $delivery["street"] }} д. {{ $delivery["building"] }}</p>
                    <label class="delivery-cost">Стоимость доставки:
                        <input
                            name="delivery-cost"
                            class="custom-form-control simple-number-input form-slim"
                            type="number"
                            value="{{ $delivery[ "cost" ] ?? null }}"
                            step="1"
                            min="500"
                            max="999999"/>
                        ₽
                    </label>
                @else
                    <p>{{ __( "common.pickup" ) }}</p>
                @endif
            </div>
            <div class="col-md-6 d-md-flex">
                <div class="ml-md-auto">
                    <h5>Контактная информация</h5>
                    <p>
                        {{ $order->user->surname }}
                        {{ $order->user->name }}
                        #{{ $order->user->id }}
                    </p>
                    <p><a href="mailto:{{ $order->user->email }}">{{ $order->user->email }}</a></p>
                    <p>{{ $order->user->phone }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="order-single-products-list">
        @foreach( $order->products as $product )
            <div class="dashboard-product-card pl-0">
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
                        <p class="order-product-count ml-sm-auto">
                            <input
                                name="{{ "product:{$product->id}" }}"
                                class="custom-form-control simple-number-input form-slim"
                                type="number"
                                value="{{ $product->info->count }}"
                                step="1"
                                min="1"
                                max="{{ $product->limit }}"
                            />
                            <span group="{{ $product->group }}"></span> шт.
                        </p>
                    </div>
                    <div class="dashboard-product-info-line flex-column flex-sm-row">
                        <div class="col-sm-5">
                            <p class="link-primary">{{ $product->partner->company_name }}</p>
                            <p>Кол-во в упаковке: <span>{{ $product->group }}</span> шт.</p>
                        </div>
                        <div class="col-sm-3 mt-2 mt-sm-0">
                            <p>Масса: <span>{{ $product->weight }} г.</span></p>
                            <p>Цена: <span>{{ $product->info->cost }} ₽</span></p>
                        </div>
                        <div class="col-sm d-flex mt-2 mt-sm-0">
                            <div class="ml-sm-auto">
                                <p>Общий вес: <span weight="{{ $product->weight * 0.001 }}"></span> кг.</p>
                                <p>Стоимость: <span price="{{ $product->info->cost }}"></span> ₽</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="order-single-footer d-flex">
        @if( $order->canRemove() )
            <button type="button" class="btn btn-primary ml-0" data-toggle="modal" data-target="#modal-accept">
                <i class="fl-bigmug-line-cross81"></i>
                <span>Удалить</span>
            </button>
        @endif
        <button type="submit" class="btn btn-primary ml-auto">
            <i class="fl-bigmug-line-save15"></i>
            <span>Сохранить</span>
        </button>
    </div>
</form>
@endsection
@section('js')
    <script src="{{ asset( 'js/dashboard/admin/order.js' ) }}"></script>
    <script src="{{ asset( 'js/dashboard/modal-window.js' ) }}"></script>
@endsection
