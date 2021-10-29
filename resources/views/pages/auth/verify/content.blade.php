@extends('pages.auth.main-frame')
@section('content')
<section class="h-100 d-flex">
@include( 'captcha' )
<div class="container m-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.verify.title') }}</div>
                <div class="card-body">
                    {{ __('auth.verify.email_check') }}
                    {{ __('auth.verify.not_receive') }},
                    <form class="d-inline" action="{{ route('verification.resend') }}">
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"><span>{{ __('auth.verify.resend') }}</span></button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section( 'js' )
	<script src="{{ asset('js/auth/verification.js') }}"></script>
@endsection
