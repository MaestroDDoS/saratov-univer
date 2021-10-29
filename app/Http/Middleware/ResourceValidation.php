<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ResourceValidation
{
    public function handle(Request $request, Closure $next, $name)
    {
        if(
            !( $user  = $request->user() ) ||
            !( $route = Route::current() ) ||
            !( DB::table($name)->where( "id", $route->parameter( "id" ) )->exists() )
        )
        {
            abort(403);
        }

        return $next($request);
    }
}
