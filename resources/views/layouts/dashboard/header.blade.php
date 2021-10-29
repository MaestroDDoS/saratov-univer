@php( $access_type = \App\Helpers\Utilities::access_type() )
<header class="section page-header">
	<nav class="dashboard-navbar-fixed">
		<button class="rd-navbar-toggle"><span></span></button>
		<div class="rd-navbar-brand">
			<a class="brand" href="{{ route( 'common' ) }}">
				<img class="brand-logo-dark" src="{{ asset( 'images/saratovs_milk.svg' ) }}" alt=""/>
			</a>
		</div>
		<div class="dashboard-navbar-buttons-field">
			<a
                class="rd-navbar-basket fl-bigmug-line-notification4 mr-2"
                href="{{ route( "dashboard.$access_type.notifications" ) }}"
            >
                @if( $count = App\Helpers\Utilities::getUncheckedNotifications( $access_type ) )
                    <span>{{ $count }}</span>
                @endif
            </a>
			<a class="rd-navbar-basket fl-bigmug-line-login12" href="{{ route( 'auth.logout' ) }}"></a>
		</div>
	</nav>
	<div class="dashboard-title-area">
		<h5 class="page-title">@yield('header-title', __( "navigation.$page") )</h5>
	</div>
</header>
