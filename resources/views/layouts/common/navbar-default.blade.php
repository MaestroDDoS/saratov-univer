<nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px" data-xl-stick-up-offset="100px" data-xxl-stick-up-offset="100px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
	<div class="rd-navbar-main-outer">
		<div class="rd-navbar-main">
			<div class="rd-navbar-panel">
				<button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
				<div class="rd-navbar-brand">
					<a class="brand" href="{{ route('common') }}"><img class="brand-logo-dark" src="{{ asset('images/media/saratovs_milk.svg') }}"/></a>
				</div>
			</div>
            <x-common.navbar-links :page=$page/>
		</div>
	</div>
</nav>
