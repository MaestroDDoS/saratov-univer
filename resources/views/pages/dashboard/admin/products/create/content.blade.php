@extends('pages.dashboard.main-frame')
@section( 'head' )
    <link rel="stylesheet" type="text/css" href="{{ asset( 'css/cropper.css' ) }}">
@endsection
@section( 'content' )
<form action="{{route('dashboard.admin.products.create')}}" class="product-table mx-auto text-left">
    <div class="dashboard-table-title">
        <h4>Создать новый товар</h4>
        <div class="dashboard-table-buttons-field">
        </div>
    </div>
    <div class="d-flex row m-4">
        <div class="d-flex flex-column cropper-img-product mr-4">
            <div class="product-img-cropper mx-auto">
                <img
                    id="img-cropper"
                    class="img-fluid mx-auto mx-md-0 img-thumbnail"
                    height="1024"
                    width="1024"
                />
            </div>
            <label class="btn mx-auto mx-sm-0 mt-2 btn-primary" for="inputImage" title="Загрузить изображение">
                <input type="file" class="sr-only" id="inputImage" name="file" accept=".png, .jpg, .jpeg">
                <i class="fl-bigmug-line-upload92 mr-2"></i>Загрузить
            </label>
        </div>
        <div class="col-sm col-md-5 col-lg-3 d-flex p-0 mt-4 mt-sm-0 flex-column">
            <div class="form-group mb-4">
                <label for="name">Название</label>
                <input type="text" class="form-control shadow-sm" name="title" validate="text" text-min-len="2" text-max-len="32">
            </div>
            <div class="form-group mb-2">
                <select name="partner_id" class="custom-form-control" validate="select">
                    <option value="" hidden>Производитель</option>
                    @foreach( $partners as $partner )
                        <option value="{{ $partner->id }}">
                            {{ $partner->company_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <select name="product_type_id" class="custom-form-control" validate="select">
                    <option value="" hidden>Тип</option>
                    @foreach( $product_types as $type )
                        <option value="{{ $type->id }}">
                            {{ __( "product.type.{$type->name}" ) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <select name="product_pack_id" class="custom-form-control" validate="select">
                    <option value="" hidden>Упаковка</option>
                    @foreach( $product_packs as $pack )
                        <option value="{{ $pack->id }}">
                            {{ __( "product.packs.{$pack->name}" ) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <select name="product_status_id" class="custom-form-control" validate="select">
                    <option value="" hidden>Статус</option>
                    @foreach( $product_statuses as $status )
                        <option value="{{ $status->id }}">
                            {{ __( "product.status.{$status->name}" ) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="product-info-inputs">
                <div class="col-6 col-md-4 col-lg-6 px-0">Акционная цена:</div>
                <div class="product-info-inputs col px-0">
                    <input class="form-control simple-number-input" name="new_cost" type="number" step="1" min="1" max="999"/>
                    <span class="ml-2">₽</span>
                </div>
            </div>
            <small class="mt-2">Активируется только при выборе статуса "{{ __( "product.status.sale" ) }}"</small>
        </div>
        <div class="col-md-12 col-lg ml-lg-4 mt-2 mt-sm-4 mt-lg-0 px-0 col-no-padding text-main-dark">
            <div class="product-info-inputs">
                <div class="col-6 col-md-4 col-lg-6">Цена:</div>
                <div class="product-info-inputs col">
                    <input class="form-control simple-number-input" name="cost" type="number" step="1" min="1" max="999"/>
                    <span class="ml-2">₽</span>
                </div>
            </div>
            <div class="product-info-inputs">
                <div class="col-6 col-md-4 col-lg-6">Кол-во в упаковке:</div>
                <div class="product-info-inputs col">
                    <input class="form-control simple-number-input" name="group" type="number" step="1" min="1" max="999"/>
                    <span class="ml-2">шт.</span>
                </div>
            </div>
            <div class="product-info-inputs">
                <div class="col-6 col-md-4 col-lg-6">Жирность:</div>
                <div class="product-info-inputs col">
                    <input class="form-control simple-number-input" name="fat" type="number" step="1" min="1" max="999"/>
                    <span class="ml-2">%</span>
                </div>
            </div>
            <div class="product-info-inputs">
                <div class="col-6 col-md-4 col-lg-6">Масса:</div>
                <div class="product-info-inputs col">
                    <input class="form-control simple-number-input" name="weight" type="number" step="1" min="1" max="9999"/>
                    <span class="ml-2">г.</span>
                </div>
            </div>
            <div class="product-info-inputs">
                <div class="col-6 col-md-4 col-lg-6">Темп. хранения:</div>
                <div class="product-info-inputs col">
                    <input class="form-control simple-number-input" name="temperature" type="number" step="1" min="1" max="999"/>
                    <span class="ml-2">±2°С</span>
                </div>
            </div>
            <div class="product-info-inputs">
                <div class="col-6 col-md-4 col-lg-6">Срок хранения:</div>
                <div class="product-info-inputs col">
                    <input class="form-control simple-number-input" name="life_time" type="number" step="1" min="1" max="999"/>
                    <span class="ml-2">суток</span>
                </div>
            </div>
            <div class="product-info-inputs">
                <div class="col-6 col-md-4 col-lg-6">Максимум на один заказ:</div>
                <div class="product-info-inputs col">
                    <input class="form-control simple-number-input" name="limit" type="number" step="1" min="1" max="999"/>
                    <span class="ml-2">шт.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="order-single-footer p-4 d-flex">
        <button type="submit" class="btn btn-primary ml-auto">
            <i class="fl-bigmug-line-save15"></i>
            <span>Сохранить</span>
        </button>
    </div>
</form>
@endsection
@section('js')
    <script src="{{ asset( 'js/cropper.js' ) }}"></script>
    <script src="{{ asset( 'js/dashboard/modal-window.js' ) }}"></script>
    <script src="{{ asset( 'js/dashboard/admin/creator.js' ) }}"></script>
@endsection
