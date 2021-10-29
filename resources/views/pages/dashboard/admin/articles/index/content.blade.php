@extends('pages.dashboard.main-frame')
@section( 'head' )
    <link rel="stylesheet" type="text/css" href="{{ asset( 'css/datepicker.css' ) }}">
@endsection
@section( 'content' )
<template id="item-ajax-template">
    @include( "templates.$template", $template_params )
</template>
<div class="dashboard-table">
    <div class="dashboard-table-title">
        <h4>Список статей</h4>
        <div class="dashboard-table-buttons-field">
            <a href="{{ route( "dashboard.admin.articles.create" ) }}"><i class="fl-bigmug-line-wrench66"></i><span>Создать новую статью</span></a>
            <button filter-update type="button">
                <i class="fl-bigmug-line-two311"></i><span>{{ __( 'dashboard.filter.update' ) }}</span>
            </button>
        </div>
    </div>
    <form action="{{url()->current()}}" class="dashboard-table-filter">
        <span class="filter-icon"><i class="fa fa-filter"></i></span>
        <div class="filter-group">
            @php( $cur = request()->query('category') )
            <label>Раздел</label>
            <select filter="category" class="form-control">
                <option value="">{{ __( 'dashboard.filter.any_m' ) }}</option>
                    @foreach( $categories as $category )
                        <option {{ $cur != $category->name ?: 'selected' }} value="{{ $category->name }}">
                            {{ __( "blog.categories.{$category->name}" ) }}
                        </option>
                    @endforeach
            </select>
        </div>
        <div class="filter-group">
            <label>{{ __( "dashboard.filter.date" ) }}</label>
            <input filter="datetime" datepicker class="form-control" value="{{request()->query('datetime')}}" type="text">
        </div>
        <button type="filter" class="btn">
            <i class="fl-bigmug-line-search74"></i><span>{{ __( 'dashboard.filter.find' ) }}</span>
        </button>
    </form>
    <div id="items-list-page">
        @foreach( $paginator as $item )
            @include( "templates.$template", $item )
        @endforeach
    </div>
    <div class="dashboard-table-footer">
        <div>
            <p id="item-list-title">
                @include( 'layouts.search_result', ['type' => 'articles'] )
            </p>
        </div>
        {{ $paginator->links( 'layouts.dashboard.pagination' ) }}
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset( 'js/datepicker.js' ) }}"></script>
    <script src="{{ asset( 'js/datepicker-ru.js' ) }}"></script>
@endsection

