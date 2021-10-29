<div class="dashboard-product-card">
    <div class="product-img-wrap">
        <img src="{{ asset( "images/partners/{$name}.png" ) }}" alt="" width="125" height="75">
    </div>
    <div class="product-info-line-wrap">
        <h6 class="dashboard-product-title link-primary">{{ $company_name }}</h6>
        <div class="dashboard-product-info-line flex-column flex-sm-row">
            <div class="col-sm-5">
                <p>{{ $slogan }}</p>
            </div>
            <div class="col-sm d-flex mt-2 mt-sm-0">
                <div class="ml-sm-auto">
{{--                    <p>Кол-во товаров: <span>20 шт.</span></p>--}}
                </div>
            </div>
            <a class="dashboard-btn-edit" href="{{ route_url( "dashboard.admin.partners.show", [ 'id' =>$id ] ) }}">
                <i class="fl-bigmug-line-gear30"></i>
            </a>
        </div>
    </div>
</div>
