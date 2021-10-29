<?php

namespace App\Http\Middleware;

use App\Models\Notification;
use Closure;
use Illuminate\Http\Request;

class MarkNotificationAsRead
{

    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if( $user && $request->has( 'read' ) )
        {
            if( $notification = Notification::where( 'id', $request->read )->checked( false )->first() )
            {
                $user_id = $notification->user_id;

                if( $user_id == $user->id || ( !$user_id && $user->is_admin ) )
                {
                    $notification->markAsRead();
                }
            }

            $query = request()->query(); unset( $query[ 'read' ] );
            $url   = url()->current() . ( !empty( $query ) ? '/?' . http_build_query( $query ) : '' );

            return redirect()->to( $url );
        }

        return $next($request);
    }
}
