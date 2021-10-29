<?php


namespace App\Extenders;

use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UrlGenerator extends \Illuminate\Routing\UrlGenerator
{
    public function getRoutes(): RouteCollectionInterface
    {
        return  $this->routes;
    }

    public function generateRouteUrl($name, $parameters)
    {
        $route = $this->routes->getByName($name);
        $path = asset( $route->uri() );

        $parameters = collect(Arr::wrap($parameters))->map( function ( $value, $key ) use ( $route ) {
            return $value instanceof UrlRoutable && $route->bindingFieldFor($key)
                ? $value->{$route->bindingFieldFor($key)}
                : $value;
        })->all();

        $path = preg_replace_callback('/\{(.*?)(\?)?\}/', function ( $m ) use ( &$parameters )
        {
            if( isset( $parameters[ $m[1] ] ) && $parameters[ $m[1] ] !== '' )
            {
                return Arr::pull( $parameters, $m[1] );
            }
            elseif( isset( $parameters[ $m[1] ] ) )
            {
                Arr::pull( $parameters, $m[1] );
            }
            return $m[0];

        }, $path);

        $path = preg_replace_callback('/\{.*?\}/', function ($match) use (&$parameters) {
            $parameters = array_merge($parameters);
            return (! isset($parameters[0]) && ! Str::endsWith($match[0], '?}'))
                ? $match[0]
                : Arr::pull($parameters, 0);
        }, $path);

        return trim(preg_replace('/\{.*?\?\}/', '', $path), '/');

    }
}
