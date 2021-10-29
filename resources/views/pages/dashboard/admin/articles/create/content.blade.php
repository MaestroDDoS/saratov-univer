@extends('pages.dashboard.main-frame')
@section( 'head' )
    <script src="https://cdn.tiny.cloud/1/7wg9vz1rue2sxjbnkq8ekrd2kak2ehhkg7mgr3mr3011hhpz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section( 'content' )
    <form action="{{ url()->current() }}" class="dashboard-table article-editor mx-auto">
        <div class="dashboard-table-title row">
            <h4>Новая статья</h4>
        </div>
        <div class="form-group mb-4">
            <label for="name">Название</label>
            <input type="text" class="form-control shadow-sm" name="name" value="" validate="text" text-min-len="2" text-max-len="32">
        </div>
        <div class="form-group mb-2">
            <select name="category" class="custom-form-control" validate="select">
                <option value="" hidden>Выберите категорию</option>
                @foreach( $categories as $category )
                    <option value="{{ $category->id }}">
                        {{ __( "blog.categories.{$category->name}" ) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <textarea id="article-mce">
            </textarea>
        </div>
        <div class="article-slider mx-0">
            <div class="slick-slider-1">
                <div class="slick-slider carousel-parent slick-nav-1 slick-nav-2" id="carousel-parent" data-items="1" data-autoplay="false" data-slide-effect="true" data-arrows="true">
                </div>
            </div>
        </div>
        <div class="order-single-footer py-4 d-flex">
            <label class="btn btn-primary ml-0" for="inputImage" title="Загрузить изображение">
                <input type="file" class="sr-only" id="inputImage" name="file" accept=".png, .jpg, .jpeg">
                <i class="fl-bigmug-line-upload92 mr-2"></i>Фотография
            </label>
            <button type="submit" class="btn btn-primary ml-auto"><i class="fl-bigmug-line-save15"></i><span>Сохранить</span></button>
        </div>
    </form>
@endsection
@section('js')
    <script src="{{ asset( "js/dashboard/admin/article.js" ) }}"></script>
@endsection
