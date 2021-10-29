<div class="container rd-navbar-project">
	@include( 'captcha' )
	<div class="rd-navbar-project-header">
		<button class="rd-navbar-project-hamburger rd-navbar-project-hamburger-close" type="button" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
			<span class="project-close"><span></span><span></span></span>
		</button>
		<h5 class="rd-navbar-project-title" 	   title-for="#rd-form-auth-login">			{{ __('auth.titles.login' 	    ) }}</h5>
		<h5 class="rd-navbar-project-title d-none" title-for="#rd-form-auth-registry">		{{ __('auth.titles.registry' 	) }}</h5>
		<h5 class="rd-navbar-project-title d-none" title-for="#rd-form-auth-password-reset">{{ __('auth.titles.forgot'       ) }}</h5>
	</div>
	<div class="rd-navbar-project-content animated" id="rd-form-auth-login">
		<form action="{{ route('auth.login') }}" class="rd-form-auth">
			<div class="rd-form-auth-fields">
				<div class="form-wrap">
					<input class="form-input" name="email" id="login-user" type="email" validate="email"/>
					<label class="form-label" for="login-user">E-mail</label>
				</div>
				<div class="form-wrap">
					<input class="form-input" name="password" id="login-password" type="password" validate="password"/>
					<label class="form-label" for="login-password">{{ __('auth.password') }}</label>
				</div>
			</div>
			<button class="button button-auth button-primary button-zakaria" type="submit"><span>{{ __('auth.send') }}</span></button>
			<div class="d-flex flex-column">
				<a href="#rd-form-auth-password-reset">{{ __('auth.missing_password') }}?</a>
				<a href="#rd-form-auth-registry" class="rd-form-auth-link mt-3">{{ __('auth.registry') }}</a>
			</div>
		</form>
	</div>
	<div class="rd-navbar-project-content animated slideOutRight" id="rd-form-auth-registry">
		<form action="{{ route('auth.register') }}" class="rd-form-auth">
			<div class="rd-form-auth-fields">
				<div class="form-wrap">
					<input class="form-input" id="register-name" name="name" type="text" validate="name"/>
					<label class="form-label" for="register-name">{{ __('auth.name') }}</label>
				</div>
				<div class="form-wrap">
					<input class="form-input" id="register-surname" name="surname" type="text" validate="surname"/>
					<label class="form-label" for="register-surname">{{ __('auth.surname') }}</label>
				</div>
				<div class="form-wrap">
					<input class="form-input" id="register-email" name="email" type="email" validate="email"/>
					<label class="form-label" for="register-email">E-mail</label>
				</div>
				<div class="form-wrap">
					<input class="form-input" id="register-phone" name="phone" type="text" validate="phone"/>
					<label class="form-label" for="register-phone">{{ __('auth.phone') }}</label>
				</div>
				<div class="form-wrap">
					<input class="form-input" id="register-password" name="password" type="password" autocomplete="new-password" validate="password" password-confirm="register-password-confirm"/>
					<label class="form-label" for="register-password">{{ __('auth.password') }}</label>
				</div>
				<div class="form-wrap">
					<input class="form-input" id="register-password-confirm" name="password-confirm" type="password" autocomplete="new-password" validate="confirm-password" password-input="register-password"/>
					<label class="form-label" for="register-password-confirm">{{ __('auth.password_confirm') }}</label>
				</div>
			</div>
			<button class="button button-auth button-primary button-zakaria" type="submit"><span>{{ __('auth.send') }}</span></button>
			<p class="mt-2">{{ __('auth.accept_part_1') }} <a href="{{ route('common','privacy_policy') }}">{{ __('auth.accept_part_2') }}</a></p>
			<div class="d-flex flex-column">
				<a href="#rd-form-auth-login" class="rd-form-auth-link mt-3">{{ __('auth.login') }}</a>
			</div>
		</form>
	</div>
	<div class="rd-navbar-project-content animated slideOutRight" data-notify-success="true" id="rd-form-auth-password-reset">
		<form action="{{ route('auth.forgot') }}" class="rd-form-auth">
			<p class="mt-2">{{ __('auth.select_email') }}</p>
			<div class="rd-form-auth-fields">
				<div class="form-wrap">
					<input class="form-input" name="email" id="password-reset-email" type="email" validate="email"/>
					<label class="form-label" for="password-reset-email">E-mail</label>
				</div>
			</div>
			<button class="button button-auth button-primary button-zakaria" type="submit"><span>{{ __('auth.send') }}</span></button>
			<div class="d-flex flex-column">
				<a href="#rd-form-auth-registry">{{ __('auth.registry') }}</a>
				<a href="#rd-form-auth-login" class="rd-form-auth-link mt-3">{{ __('auth.login') }}</a>
			</div>
		</form>
	</div>
</div>
