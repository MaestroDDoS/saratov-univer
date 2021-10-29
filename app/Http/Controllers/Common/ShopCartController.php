<?php

namespace App\Http\Controllers\Common;

use App\Helpers\Utilities;
use App\Http\Controllers\Basic\AjaxController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use \Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Barryvdh\Debugbar\Facade as Debugbar;

class ShopCartController extends AjaxController
{
    private $products_count_limit = 30;

    public function __construct()
    {
        $this->middleware( ['auth', 'verified'] );
        $this->middleware( ['throttle:6,1'] )->only( 'post' );
    }

    protected function generateProductsList( $list )
    {
        $items = [ 'cost' => 0, 'weight' => 0, 'list' => [] ];

        $products = Product::without( [ 'partner', 'product_type' ] )
            ->filter([ 'id' => array_keys( $list ) ])
            ->take( $this->products_count_limit )
            ->get();

        foreach( $products as $key => $product )
        {
            $item_count = $list[ $product->id ] ?? null;

            if( is_numeric( $item_count ) )
            {
                $count = ceil( max( 1, min( $product->limit, $list[ $product->id ] ) ) );
                $mass  = $product->weight;
                $cost  = $product->real_cost;

                $items[ 'list' ][ $key ] = [

                    'id'     => $product->id,
                    'name'   => $product->title,
                    'count'  => $count,
                    'limit'  => $product->limit,
                    'group'  => $product->group,
                    'weight' => $mass,
                    'cost'   => $cost,

                ];

                $items[ 'weight' ] += ( $product->group * $count * $mass ) * 0.001;
                $items[ 'cost'   ] += ( $product->group * $count * $cost );

            }
        }

        return  $items;
    }

    protected function CreateCustomParams(): array
    {
        return [ 'items' => $this->generateProductsList( Utilities::getShopCartItems() )[ 'list' ] ];
    }

    protected function ajax($result=[])
    {
        $params = request()->all();

        if( !isset( $params['items'] ) )
            abort( 400, trans( 'common.empty_cart' ) );

        $order = new Order();
        $products = [];

        if( $address = $params[ 'address' ] ?? null )
        {
            try
            {
                $response = Http::get("https://kladr-api.ru/api.php", [

                    'contentType' => 'building',
                    'withParent'  => '1',
                    'limit'       => '1',
                    'buildingId'  => $address['id']  ,
                    'buildingName'=> $address['name'],

                ] );

                if( $save_address = $response->json()[ 'result' ][ 0 ] )
                {
                    $parents = $save_address[ 'parents' ];

                    $order->delivery = [

                        "zip"      => $save_address[ "zip"  ],
                        "region"   => $parents[ 0 ][ "name" ],
                        "city"     => $parents[ 1 ][ "name" ],
                        "street"   => $parents[ 2 ][ "name" ],
                        "building" => $address     [ "name" ],

                    ];
                }
            }
            catch( Exception $e )
            {
                abort( 400, trans( 'common.invalid_address' ) );
            }
        }

        $min_weight = config( 'saratov.min_weight' );
        $items      = $this->generateProductsList( $params['items'] );

        if( $items['weight'] < $min_weight )
            abort( 400, trans( 'common.min_weight' )." ".$min_weight." ".trans( 'notation.kg' ) );

        $order->user()        ->associate( Auth::user() );
        $order->order_status()->associate( OrderStatus::take(1)->first() );
        $order->weight = $items['weight'];
        $order->cost   = $items['cost'];
        $order->save();

        foreach( $items['list'] as $item )
        {
            $products[ $item['id'] ] = [ 'count' => $item['count'], 'cost' => $item['cost'] ];
        }

        $order->products()->attach( $products );

        return response()->json( [

            'status' => true,
            'href'   => route( 'dashboard.user.orders' )

        ] )->withCookie(

            cookie()->forget( config( 'saratov.shopcart_cookie.name' ) )

        );
    }
}
