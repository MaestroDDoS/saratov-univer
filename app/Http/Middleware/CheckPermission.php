<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use \App\Enums\UserPermissions;
use Illuminate\Support\Str;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = $request->user();

        if( !$user || !$user->hasPermissions( UserPermissions::getValue( $permission ) ) )
        {
            abort( 403);
        }

        return $next($request);
    }
}
