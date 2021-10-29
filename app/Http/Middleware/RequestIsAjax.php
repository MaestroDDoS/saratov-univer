<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestIsAjax
{

    public function handle(Request $request, Closure $next)
    {
        if( $request->isMethod( 'post' ) && !$request->ajax() )
        {
            abort(400);
        }
        return $next($request);
    }
}
