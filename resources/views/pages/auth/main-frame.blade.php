<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title', __( "navigation.$page") )</title>
    @include('head')
	@yield('head')
</head>
<body>
    @include('preloader')
    <div class="page d-flex flex-column" style="height: 100vh;">
		<section class="breadcrumbs-custom">
			@include('layouts.common.breadcrumbs')
		</section>
        @yield('content')
		<footer class="section footer-modern">
			@include( 'footer' )
		</footer>
    </div>
    @include('js')
	@yield('js')
    <script src="https://hcaptcha.com/1/api.js?recaptchacompat=off" async defer></script>
</body>
</html>

