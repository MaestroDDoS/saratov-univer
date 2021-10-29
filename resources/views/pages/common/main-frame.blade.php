<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title', __( "navigation.$page") )</title>
    @include('head')
	@yield('head')
</head>
<body>
    @include('preloader')
    <div class="page">
        <header class="section page-header">
            <div class="rd-navbar-wrap">
                @includeFirst(["pages.$page.navbar","layouts.common.navbar-default"])
            </div>
        </header>
        @yield('content')
		<x-common.footer/>
    </div>
    @include('js')
	<script src="{{ asset('js/auth-form.js') }}"></script>
	@yield('js')
    <script src="https://hcaptcha.com/1/api.js?recaptchacompat=off" async defer></script>
</body>
</html>

