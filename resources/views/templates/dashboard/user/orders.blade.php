<div class="order-table-line">
    <div></div>
    <div class="col-5 col-sm-3 col-lg-2">№ {{ $id }}</div>
    <div class="col-2 d-none d-lg-block">{{ $city }}</div>
    <div class="col col-sm col-md-3 status">
        <span class="{{ $status }}">&bull;</span>
        <span>{{ $status_text }}</span><i class="fl-bigmug-line-nine16"></i>
    </div>
    <div class="col d-none d-md-block">{{ $weight }} {{ __( 'notation.kg' ) }}</div>
    <div class="col-2 d-none d-sm-block">{{ $cost }} ₽</div>
    <div>
        <a class="btn" href="{{ route_url( 'dashboard.user.orders.show', [ 'id' => $id ] ) }}">
            <i class="fl-bigmug-line-double98"></i>
        </a>
    </div>
</div>
