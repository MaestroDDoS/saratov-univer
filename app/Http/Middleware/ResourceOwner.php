<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ResourceOwner
{
    public function handle(Request $request, Closure $next, $name)
    {
        if(
            !( $user  = $request->user() )                                                                                              ||
            !( $route = Route::current() )                                                                                              ||
            !( $owner = DB::table($name)->select( "user_id" )->where( "id", $route->parameter( "id" ) )->first() ) ||
            ( $owner->user_id != $user->id )
        )
        {
            abort(403);
        }

        return $next($request);
    }
}
