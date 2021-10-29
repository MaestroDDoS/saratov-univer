<nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px" data-xl-stick-up-offset="120px" data-xxl-stick-up-offset="140px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
    <div class="rd-navbar-aside-outer">
        <div class="rd-navbar-aside">
            <div class="rd-navbar-collapse">
                <div class="contacts-ruth">
                    <div class="unit unit-spacing-sm2 align-items-center">
                        <div class="unit-left"><span class="icon fl-bigmug-line-right141"></span></div>
                        <div class="unit-body">410080, Россия, Саратов<br/>Сокурский тракт, 1</div>
                    </div>
                </div>
            </div>
            <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <div class="rd-navbar-brand">
                    <a class="brand" href="{{ route('common') }}"><img class="brand-logo-dark rd-navbar-brand-home" src="{{ asset('images/media/saratovs_milk.svg') }}" alt=""/></a>
                </div>
            </div>
            <div class="rd-navbar-button">
                <a class="button button-sm button-icon button-icon-left button-default-outline-3 button-zakaria" href="mailto:{{ config('saratov.mail_main') }}">
                    <span class="icon mdi mdi-email-outline"></span>{{ __('common.contact_us') }}
                </a>
            </div>
        </div>
    </div>
    <div class="rd-navbar-main-outer">
		<div class="rd-navbar-main">
            <x-common.navbar-links :page=$page/>
		</div>
    </div>
</nav>
