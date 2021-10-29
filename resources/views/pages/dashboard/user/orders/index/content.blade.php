@extends('pages.dashboard.main-frame')
@section( 'content' )
<template id="item-ajax-template">
    @include( "templates.$template", $template_params )
</template>
<div class="dashboard-table">
    <div class="dashboard-table-title">
        <h4>{{ __( 'order.list' ) }}</h4>
        <div class="dashboard-table-buttons-field">
            <button type="button">
                <i class="fl-bigmug-line-file69"></i><span>{{ __( 'dashboard.filter.save2pdf' ) }}</span>
            </button>
            <button filter-update type="button">
                <i class="fl-bigmug-line-two311"></i><span>{{ __( 'dashboard.filter.update' ) }}</span>
            </button>
        </div>
    </div>
    <form action="{{ url()->current() }}" class="dashboard-table-filter">
        <span class="filter-icon"><i class="fa fa-filter"></i></span>
        <div class="filter-group">
            @php( $status = request()->query('status') )
            <label>{{ __( 'dashboard.filter.status' ) }}</label>
            <select filter="status" class="form-control">
                <option value="">{{ __( 'dashboard.filter.any_m' ) }}</option>
                @foreach( $order_status_list as $name )
                    <option {{ $status != $name ?: 'selected' }} value="{{ $name }}">{{ __( "order.status.$name" ) }}</option>
                @endforeach
            </select>
        </div>
        <div class="filter-group">
            @php( $delivery = request()->query('delivery') )
            <label>{{ __( 'dashboard.filter.delivery' ) }}</label>
            <select filter="delivery" class="form-control">
                <option value="">{{ __( 'dashboard.filter.any_f' ) }}</option>
                <option {{ $delivery != "true"  ?: 'selected' }} value="true">{{ __( 'common.delivery' ) }}</option>
                <option {{ $delivery != "false" ?: 'selected' }} value="false">{{ __( 'common.pickup' ) }}</option>
            </select>
        </div>
        <div class="filter-group">
            <label for="filter-order-id">{{ __( 'dashboard.filter.id' ) }}</label>
            <input filter="id" value="{{ request()->query('id') }}" class="form-control" type="text">
        </div>
        <button type="filter" class="btn">
            <i class="fl-bigmug-line-search74"></i><span>{{ __( 'dashboard.filter.find' ) }}</span>
        </button>
    </form>
    <div class="order-table-list">
        <div class="order-table-list-header">
            <div></div>
            <div class="col-5 col-sm-3 col-lg-2">{{ __( 'dashboard.filter.id' ) }}</div>
            <div class="col-2 d-none  d-lg-block">{{ __( 'common.address.city' ) }}</div>
            <div class="col   col-sm  col-md-3">{{ __( 'dashboard.filter.status' ) }}</div>
            <div class="col   d-none d-md-block">{{ __( 'common.weight' ) }}</div>
            <div class="col-2 d-none d-sm-block">{{ __( 'common.cost' ) }}</div>
            <div></div>
        </div>
        <div id="items-list-page">
            <div class="order-table-lines-wrap">
                @foreach( $paginator as $item )
                    @include( "templates.$template", $item )
                @endforeach
            </div>
        </div>
        <div class="dashboard-table-footer">
            <div>
                <p id="item-list-title">
                    @include( 'layouts.search_result', ['type' => 'orders'] )
                </p>
            </div>
            {{ $paginator->links( 'layouts.dashboard.pagination' ) }}
        </div>
    </div>
</div>
@endsection

