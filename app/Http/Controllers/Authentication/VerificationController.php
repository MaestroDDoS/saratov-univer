<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use phpDocumentor\Reflection\Types\Array_;

class VerificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware( ['signed' , 'throttle:6,1'] )->only('verify');
        $this->middleware( ['captcha', 'throttle:6,1'] )->only('resend');
    }

    public function verify(EmailVerificationRequest $request)
    {
        if( !$request->authorize() )
            abort( 400 );

        if( !$request->user()->hasVerifiedEmail() )
            $request->fulfill();

        $request->session()->flash('flash_msg', trans( 'auth.success.verify' ));
        return redirect(RouteServiceProvider::HOME);
    }

    public function resend(Request $request)
    {
        if( !$request->ajax() )
            abort( 403);

        if( !$request->user()->hasVerifiedEmail() )
        {
            $request->user()->sendEmailVerificationNotification();
            return  new JsonResponse([ 'status' => true, 'message' => trans( 'auth.verify.new_mail' ) ]);
        }
    }

    public function show(Request $request)
    {
        if( $request->user()->hasVerifiedEmail() )
            return redirect(RouteServiceProvider::HOME);

        return view( 'pages.auth.verify.content', [ 'page' => 'auth.verify' ] );
    }
}
