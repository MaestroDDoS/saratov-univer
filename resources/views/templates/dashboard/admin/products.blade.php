<div class="dashboard-product-card">
    <div class="product-img-wrap">
        <img src="{{ asset( "images/products/{$id}/small.png" ) }}" alt="" width="96" height="96">
    </div>
    <div class="product-info-line-wrap">
        <h6 class="dashboard-product-title">
            <a href="{{ route_url( "common.shop.product", [ "id" => $id ] ) }}">
                {{ $title }}
            </a>
        </h6>
        <div class="dashboard-product-info-line flex-column flex-sm-row">
            <div class="col-sm-5">
                <p class="link-primary">{{ $partner }}</p>
                <p>{{ __( "product.characteristic.group" ) }}: <span>{{ $group }}</span> {{ __( "notation.count" ) }}</p>
            </div>
            <div class="col-sm-3 mt-2 mt-sm-0">
                <p>{{ __( "common.weight" ) }}: <span>{{ $weight }} {{ __( "notation.g" ) }}.</span></p>
                <p>{{ __( "common.cost" ) }}: <span>{{ $cost }} ₽</span></p>
            </div>
            <div class="col-sm d-flex mt-2 mt-sm-0">
                <div class="ml-sm-auto">
                    <p>{{ __("common.total_weight" ) }}: <span>{{ $total_weight }} {{ __( "notation.kg" ) }}.</span></p>
                    <p>{{__( "dashboard.cost" )}}: <span>{{ $total_cost }} ₽</span></p>
                </div>
            </div>
            <a href="{{route_url( "dashboard.admin.products.show", [ "id" => $id ] )}}" class="dashboard-btn-edit"><i class="fl-bigmug-line-gear30"></i></a>
        </div>
    </div>
</div>
