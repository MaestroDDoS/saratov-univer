<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facade as Debugbar;

class LoginController extends Controller
{

    use ThrottlesLogins;

    public function __construct()
    {
        $this->middleware( [ 'guest', 'captcha' ] );
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function username(): string
    {
        return 'email';
    }

    protected function credentials( Request $request ): array
    {
        return $request->only( $this->username(), 'password' );
    }

    public function __invoke( Request $request)
    {
        $this->validateLogin($request);

        if( $this->hasTooManyLoginAttempts( $request ) )
        {
            $this->fireLockoutEvent( $request );
            return $this->sendLockoutResponse( $request );
        }

        if( $this->attemptLogin( $request ) )
        {
            return $this->sendLoginResponse( $request );
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);

    }

    private function validateLogin(Request $request)
    {
        $request->validate( [

            $this->username() => 'required|string',
            'password'        => 'required|string',

        ] );
    }

    private function attemptLogin(Request $request): bool
    {
        return $this->guard()->attempt( $this->credentials($request), true );
    }

    private function sendLoginResponse(Request $request): JsonResponse
    {
        $request->session()->flash('flash_msg', trans( 'auth.success.login' ));
        return new JsonResponse( [ 'status' => true, 'href' => url()->previous() ] );
    }

    private function sendFailedLoginResponse(Request $request): JsonResponse
    {
        return new JsonResponse( [ 'status' => false, 'message' => trans('auth.errors.invalid.login') ] );
    }
}
