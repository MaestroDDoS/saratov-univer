@extends('pages.dashboard.main-frame')
@section( 'content' )
<template id="item-ajax-template">
    @include( "templates.$template", $template_params )
</template>
<div class="dashboard-table">
    <div class="dashboard-table-title">
        <h4>Список производителей</h4>
        <div class="dashboard-table-buttons-field">
            <a href="{{ route( "dashboard.admin.partners.create" ) }}">
                <i class="fl-bigmug-line-wrench66"></i><span>Создать нового партнера</span>
            </a>
            <button filter-update type="button">
                <i class="fl-bigmug-line-two311"></i><span>{{ __( 'dashboard.filter.update' ) }}</span>
            </button>
        </div>
    </div>
    <form action="{{url()->current()}}" class="dashboard-table-filter">
        <span class="filter-icon"><i class="fa fa-filter"></i></span>
        <div class="filter-group">
            <label>Название</label>
            <input filter="company_name" class="form-control" value="{{ request()->query('company_name') }}" type="text">
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
                @include( 'layouts.search_result', ['type' => 'partners'] )
            </p>
        </div>
        {{ $paginator->links( 'layouts.dashboard.pagination' ) }}
    </div>
</div>
@endsection

