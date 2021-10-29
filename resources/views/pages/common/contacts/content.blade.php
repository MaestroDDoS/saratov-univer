@extends('pages.common.main-frame')
@section('content')
<section class="breadcrumbs-custom">
	@include('layouts.common.breadcrumbs')
</section>
<section class="section section-sm bg-default text-md-left">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 d-flex flex-column pb-4">
				<div id="phones_block" class="contact_block">
					<span></span>
					<h4>{{ __('common.contacts.phones') }} (<span>{{ config('saratov.contacts_phones.prefix') }}</span>)</h4>
					<ul class="list-categories">
						@foreach( config('saratov.contacts_phones.list') as $type => $phone )
							<li>
								<a href="tel:{{ config('saratov.contacts_phones.prefix') . " $phone" }}">{{ __( "common.contacts.$type" ) }}</a>
								<span class="list-categories-number">{{ $phone }}</span>
							</li>
						@endforeach
					</ul>
				</div>
				<div class="contact_block">
					<span></span>
					<h4>E-mail</h4>
					<p><a href="mailto:{{config('saratov.mail_main')}}">{{ config('saratov.mail_main') }}</a></p>
					<p><a href="mailto:{{config('saratov.mail_second')}}">{{ config('saratov.mail_second') }}</a></p>
				</div>
			</div>
			<div class="col-lg-5 pb-4">
				<div class="contact_block h-100">
					<span></span>
					<h4>{{ __('common.contacts.work_hours') }}</h4>
					<ul class="list-categories">
					@foreach( config('saratov.work_hours') as $idx => $time )
						<li><span>{{ jddayofweek( $idx, 1 ) }}</span><span class="list-categories-number">{{ $time ?: __('common.contacts.weekend') }}</span></li>
					@endforeach
					</ul>
					<div class="tollfree_block">
						<h4>{{ __('common.contacts.hot_link') }}</h4>
						<p>{{ config('saratov.phone_main') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section( 'js' )
	<script src="{{ asset('js/common/contacts.js') }}"></script>
@endsection