<div class="dashboard-product-card">
    <div class="product-info-line-wrap">
        <div class="d-sm-flex align-items-center">
            <h6 class="dashboard-product-title">Заказ №{{ $id }}</h6>
            <p class="status">
                <span class="{{ $status }}">&bull;</span>
                <span>{{ $status_text }}</span>
            </p>
        </div>
        <div class="dashboard-product-info-line flex-column flex-sm-row">
            <div class="col-sm-4 mt-2 mt-sm-0">
                <p>Стоимость: <span>{{ $weight }} {{ __( 'notation.kg' ) }}</span></p>
                <p>Вес: <span>{{ $cost }} ₽</span></p>
            </div>
            <div class="col-sm d-flex mt-2 mt-sm-0">
                <div class="ml-sm-auto text-sm-right">
                    <p><span>{{ $city }}</span></p>
                    <p><span>{{ $address }}</span></p>
                </div>
            </div>
            <a class="dashboard-btn-edit" href="{{ route_url( 'dashboard.admin.orders.show', [ 'id' => $id ] ) }}">
                <i class="fl-bigmug-line-gear30"></i>
            </a>
        </div>
    </div>
</div>
