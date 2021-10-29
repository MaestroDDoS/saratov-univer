@extends('pages.dashboard.main-frame')
@section( 'head' )
    <link rel="stylesheet" type="text/css" href="{{ asset( 'css/datepicker.css' ) }}">
    <meta notify-0="{{ __( "dashboard.notifications.0" ) }}" notify-1="{{ __( "dashboard.notifications.1" ) }}">
@endsection
@section( 'content' )
<template id="item-ajax-template">
    @include( "templates.$template", $template_params )
</template>
<div class="dashboard-table">
	<div class="dashboard-table-title">
		<h4>{{ __( "common.notifications" ) }}</h4>
		<div class="dashboard-table-buttons-field">
			<button filter-update type="button">
                <i class="fl-bigmug-line-two311"></i><span>{{ __( 'dashboard.filter.update' ) }}</span>
            </button>
		</div>
	</div>
	<form action="{{ url()->current() }}" class="dashboard-table-filter">
		<span class="filter-icon"><i class="fa fa-filter"></i></span>
		<div class="filter-group">
			<label>{{ __( "dashboard.filter.date" ) }}</label>
            <input filter="datetime" datepicker class="form-control" value="{{request()->query('datetime')}}" type="text">
		</div>
		<button type="filter" class="btn"><i class="fl-bigmug-line-search74"></i><span>Найти</span></button>
	</form>
	<div class="notify-table" id="items-list-page">
        @php( $curtype = null )
        @foreach( $paginator as $item )
            @if( $curtype != $item[ "checked" ] )
                @php( $curtype = $item[ "checked" ] )
                <div class="notify-table-header">
                    <h6 class="dashboard-product-title m-0">{{ __( "dashboard.notifications.{$curtype}" ) }}</h6>
                </div>
            @endif
            @include( "templates.$template", $item )
        @endforeach
	</div>
    <div class="dashboard-table-footer">
        <div>
            <p id="item-list-title">
                @include( 'layouts.search_result', ['type' => 'notifications'] )
            </p>
        </div>
        {{ $paginator->links( 'layouts.dashboard.pagination' ) }}
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset( 'js/datepicker.js' ) }}"></script>
    <script src="{{ asset( 'js/datepicker-ru.js' ) }}"></script>
    <script src="{{ asset( 'js/dashboard/notifications.js' ) }}"></script>
@endsection
