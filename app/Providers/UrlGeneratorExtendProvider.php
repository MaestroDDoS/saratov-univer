<?php

namespace App\Providers;

use App\Extenders\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class UrlGeneratorExtendProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton("url", function($app) {
            $routes = $app['router']->getRoutes();
            return new UrlGenerator(  // this is actually my class due to the namespace above
                $routes, $app->rebinding(
                'request', $this->requestRebinder()
            ), $app['config']['app.asset_url']
            );
        });
    }

    protected function requestRebinder()
    {
        return function ($app, $request) {
            $app['url']->setRequest($request);
        };
    }
}
