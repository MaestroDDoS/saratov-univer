<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware( ['captcha', 'throttle:6,1'] )->only('resend');
    }

    public function broker(): PasswordBroker
    {
        return Password::broker();
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    protected function rules(): array
    {
        return [
            'token' => 'required',
            'password'         => ['required', 'string', 'regex:/^[a-zA-Z0-9!@#$%^&*]{5,32}$/' ],
            'password-confirm' => ['same:password'],
        ];
    }

    protected function sendResponse( $message, $status=true ): JsonResponse
    {
        return new JsonResponse( [ 'status' => $status, 'message'=> trans($message) ] );
    }

    protected function sendResetFailedResponse( $message ): JsonResponse
    {
        return $this->sendResponse( $message, false );
    }

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password', 'password_confirmation', 'token' );
    }

    protected function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);
    }

    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));
        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }

    public function resend(Request $request): JsonResponse
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink( $request->only('email') );

        if( $response != Password::RESET_LINK_SENT )
            return $this->sendResetFailedResponse('auth.errors.missing.email');

        return $this->sendResponse('auth.success.reset');
    }

    public function reset(Request $request): JsonResponse
    {

        $request->validate($this->rules());

        $response = $this->broker()->reset(

            $this->credentials($request),

            function ($user, $password)
            {
                $this->resetPassword($user, $password);
            }
        );

        if( $response != Password::PASSWORD_RESET )
            return $this->sendResetFailedResponse('auth.errors.invalid.token');

        return $this->sendResponse('auth.success.login');
    }

    public function show(Request $request)
    {

        $token = $request->route()->parameter('token');
        $email = $request->email;

        return  view( 'pages.auth.reset.content' , [

            'page'  => 'auth.reset',
            'token' => $token,
            'email' => $email,

        ] );
    }
}
