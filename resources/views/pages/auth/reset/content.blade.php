@extends('pages.auth.main-frame')
@section('content')
<section class="h-100 d-flex">
@include( 'captcha' )
<div class="container m-auto">
    <div class="row justify-content-center">
        <div class="col-md-8 col-xl-6">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}: {{ $email }}</div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}">
						<input type="hidden" name="token" value="{{ $token }}">
						<input type="hidden" name="email" value="{{ $email }}">
                        <div class="rd-form-auth-fields">
							<div class="form-wrap">
								<input class="form-input" id="register-password" name="password" type="password" autocomplete="new-password" validate="password" password-confirm="register-password-confirm"/>
								<label class="form-label" for="register-password">{{ __('auth.password') }}</label>
							</div>
							<div class="form-wrap">
								<input class="form-input" id="register-password-confirm" name="password-confirm" type="password" autocomplete="new-password" validate="confirm-password" password-input="register-password"/>
								<label class="form-label" for="register-password-confirm">{{ __('auth.password_confirm') }}</label>
							</div>
						</div>
                        <div class="form-group row mx-auto col col-md-9 mb-0">
							<button type="submit" class="button button-auth button-primary button-zakaria">
								{{ __('Reset Password') }}
							</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section( 'js' )
	<script src="{{ asset('js/auth/reset-password.js') }}"></script>
@endsection