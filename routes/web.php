<?php

use App\Helpers\Utilities;
use App\Http\Controllers\Authentication\RegisterController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Authentication routes
|--------------------------------------------------------------------------
*/

Route::group( [ 'namespace' => 'Authentication', 'prefix' => 'auth' ], function() {

    Route::post( 'reset-password'        , 'ResetPasswordController@reset')->name( 'password.update' );
    Route::get(  'reset-password/{token}', 'ResetPasswordController@show' )->name( 'password.reset'  );

    Route::get( 'email-verify'            , 'VerificationController@show'   )->name('verification.notice');
    Route::post('email-verify/resend'     , 'VerificationController@resend' )->name('verification.resend');
    Route::get( 'email-verify/{id}/{hash}', 'VerificationController@verify' )->name('verification.verify');

    Route::name( 'auth' )->group( function() {

        Route::get(  ''               , 'AuthController'                );
        Route::get(  'logout'         , 'LogoutController'              )->name( '.logout'   );
        Route::post( 'login'	      , 'LoginController'               )->name( '.login'    );
        Route::post( 'forgot-password', 'ResetPasswordController@resend')->name( '.forgot'   );
        Route::post( 'register'       , 'RegisterController'            )->name( '.register' );

    } );
} );

/*
|--------------------------------------------------------------------------
| Common routes
|--------------------------------------------------------------------------
*/

Route::group( [ 'namespace' => 'Common', 'as' => 'common' ], function() {

    Route::name( '.' )->group( function() {

        Utilities::ajax_route( 'gallery'   );
        Utilities::ajax_route( 'blog'      );
        Utilities::ajax_route( 'shop'      );
        Utilities::ajax_route( 'shop/cart' );

        Route::get( '/blog/article/{id}', 'ArticleController' )->name( 'blog.article' );
        Route::get( '/shop/product/{id}', 'ProductController' )->name( 'shop.product' );

        Route::get( '/info/{page}'      , 'StaticPageController' )->name( 'info' );

    } );

    Route::get( '/{page?}', 'StaticPageController' );

} );

/*
|--------------------------------------------------------------------------
| Dashboard routes
|--------------------------------------------------------------------------
*/

Utilities::routeGroup( [ 'dashboard', 'user' ], function() {

    Utilities::ajax_route( 'profile' );

    Utilities::resource( 'orders',        [ 'show', 'delete' ] );
    Utilities::resource( 'notifications', [                  ] );

} );

Utilities::routeGroup( [ 'dashboard', 'admin' ], function() {

    Route::middleware( [ 'auth.admin' ] )->group( function() {

        foreach( ['orders', 'users', 'products', 'partners', 'articles', 'notifications' ] as $name)
        {
            Utilities::resource( $name, Utilities::$actions, true );
        }
    } );
} );

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/

Auth::routes( [

    'login'    => false,
    'logout'   => false,
    'register' => false,
    'reset'    => false,
    'confirm'  => false,
    'verify'   => false,

] );
