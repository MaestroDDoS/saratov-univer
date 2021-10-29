<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title', __( "navigation.$page") )</title>
    @include('head')
	@yield('head')
</head>
<body>
    @include('preloader')
    <x-dashboard.aside-navbar :page=$page/>
	<div class="page page-dashboard">
		@include( 'layouts.dashboard.header' )
		<section class="section text-md-left">
			<div class="main-content-inner">
                @yield('content')
			</div>
		</section>
        <footer class="section footer-modern">
		    @include( 'footer' )
        </footer>
	</div>
    @include('js')
	<script src="{{ asset('js/dashboard/main.js') }}"></script>
	@yield('js')
    <script src="https://hcaptcha.com/1/api.js?recaptchacompat=off" async defer></script>
</body>
</html>

