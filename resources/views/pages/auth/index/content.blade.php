@extends('pages.auth.main-frame')
@section('content')
<section class="section auth-form section-sm">
	@include( 'layouts.auth-form' )
</section>
@endsection
@section( 'js' )
	<script src="{{ asset('js/auth-form.js') }}"></script>
@endsection