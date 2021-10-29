<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class Captcha
{

    public function handle(Request $request, Closure $next)
    {
        $token = $request->header( 'X-CAPTCHA-TOKEN' );

        if( is_string( $token ) ) {

            $response = Http::asForm()->post("https://hcaptcha.com/siteverify", [

                'secret' => config('saratov.captcha.private-key'),
                'response' => $token,

            ] );

            if( $response->successful() ) {

                $info = json_decode( $response->body(), true);

                if( $info['success'] )
                {
                    return $next($request);
                }
            }
        }

        abort( 500, 'invalid captcha' );

    }
}
