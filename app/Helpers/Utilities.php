<?php

namespace App\Helpers;

use App\Models\Notification;
use Carbon\Carbon;
use Closure;
use hanneskod\classtools\Tests\MockFinder;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Barryvdh\Debugbar\Facade as Debugbar;

class Utilities
{

    protected static string $page_default     = 'index';
    protected static array  $resource_actions = [

        [ 'show'  , 'get' , '' ],
        [ 'update', 'post',    ],
        [ 'delete', 'post',    ],

    ];

    public static array $actions = [ 'show', 'update', 'delete', 'create' ];

    public static function getRoutePage($route_name, $page = null)
    {
        $curpage = $page ?? self::$page_default;
        $pages = [ $route_name, $route_name.".$curpage" ];

        foreach( $pages as $page )
        {
            if( view()->exists( "pages.$page.content" ) )
            {
                return  $page;
            }
        }

        return false;
    }

    public static function uid_from_query( $controller, $prefix )
    {
        return  $prefix.sha1( serialize( $controller->generate_query_params() ).app()->getLocale() );
    }

    public static function access_type()
    {
        return  basename( Route::getCurrentRoute()->getPrefix() );
    }

    public static function ajax_route( $uri )
    {
        $path = explode( '/', ucwords( $uri, '/' ) );
        $name = implode( '.', $path );

        $controller = implode( '', $path )."Controller";

        Route::post( "/$uri", "$controller@post" )->action[ "as" ] = null;
        Route::get(  "/$uri", "$controller@get"  )->name( strtolower( $name ) );
    }

    public static function routeGroup( $names , $register )
    {
        Route::group( [

            'prefix'    => implode( '/', $names ),
            'as'        => implode( '.', $names ) . '.',
            'namespace' => ucwords( implode( '\\', $names ), '\\' ),

        ], $register );
    }

    public static function resource( $name, $actions=null, $check_access=null )
    {
        Route::middleware( [ 'verified' ] )->group( function() use ($name, $actions, $check_access) {

            $actions    = $actions ?? self::$actions;
            $controller = ucfirst( $name )."Controller";

            $read_permission = "permission:Read".Str::studly( $name );
            $write_permission = "permission:Write".Str::studly( $name );

            Route::middleware( $check_access ? $read_permission : [] )->group( function() use ($name){

                self::ajax_route( $name );

            } );

            Route::middleware( $check_access ? $write_permission : [] )->group( function() use ($name,$actions,$controller,$check_access) {

                if( in_array( 'create', $actions ) )
                {
                    Route::get(  "/$name/create", "$controller@create_page" )->name( "$name.create" );
                    Route::post( "/$name/create", "$controller@create_new" )->action[ "as" ] = null;
                }

                foreach( self::$resource_actions as $action )
                {
                    $method = $action[0];

                    if( in_array( $method, $actions ) )
                    {
                        $request_type = $action[1];
                        $prefix       = $action[2] ?? $method;

                        $route = Route::$request_type( "/$name/{id}/{$prefix}", "$controller@$method" )->middleware( [ "resource.valid:$name" ] );

                        if( !$check_access )
                        {
                            $route->middleware( [ "resource.owner:$name" ] );
                        }

                        $route->name( "$name.$method" );
                    }
                }
            } );
        } );
    }

    public static function getArticleImages($offset, $length=null)
    {
        $result = Cache::rememberForever('ArticleImages', function() {

            $images = File::glob( public_path( "images/articles/*/src/*" ) );
            $result = [ 'data' => [], 'count' => count( $images ) ];

            foreach( $images as $key => $image )
            {
                $idx = pathinfo( $image, PATHINFO_FILENAME );
                $id  = basename( dirname( $image, 2 ) );

                $result[ 'data' ][ $key ] = [ 'id' => $id, 'idx' => $idx ];
            }

            return  $result;

        } );

        $result[ 'data' ] = array_slice( $result[ 'data' ], $offset, $length );
        return  $result;

    }

    public static function getUncheckedNotifications( $type )
    {
        return  Notification::{"for$type"}( request()->user()->id )->checked( false )->count();
    }

    public static function getRandomTimestamp($backwardDays = -800): Carbon
    {
        return Carbon::now()->addDays(rand($backwardDays, 0))->addMinutes(rand(0, 60 * 23))->addSeconds(rand(0, 60));
    }

    public static function getFileContent( $file_name, $default = "" ): string
    {
        if( !Storage::exists( $file_name ) )
            return  $default;

        return Storage::get( $file_name );
    }

    public static function getCurrentPage($page = null)
    {
        return  self::getRoutePage(Route::currentRouteName(), $page);
    }

    public static function getShopCartItems(): array
    {
        return  json_decode( request()->cookie( config('saratov.shopcart_cookie.name') ), true ) ?? [];
    }

    public static function getRoute($name)
    {
        return  app('url')->getRoutes()->getByName( $name );
    }

    public static function generateRouteUrl($name, $parameters)
    {
        return app('url')->generateRouteUrl($name, $parameters);
    }

    public static function generateNavigationLinks(&$nav_links)
    {
        foreach( $nav_links as $idx => &$cfg )
        {
            $route = $cfg[0]; $nav_page = $cfg[1] ?? null;

            $cfg[0] = route( $route, $nav_page );
            $cfg[1] = Utilities::getRoutePage( $route, $nav_page );
        }
    }
}


