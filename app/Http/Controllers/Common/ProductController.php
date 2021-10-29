<?php

namespace App\Http\Controllers\Common;

use App\Helpers\Time;
use App\Http\Controllers\Basic\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class ProductController extends StaticPageController
{
    protected function CreateCustomParams(): array
    {
        $id = Route::current()->parameter( 'id' );

        $result = Cache::remember( "product_info_{$id}_".app()->getLocale(), 15 * 60, function() use($id){

            $product = Product::with( 'product_pack' )->find( $id );

            if( $product )
            {
                return [

                    'id'            => $product->id,
                    'name'          => $product->title,
                    'cost'          => $product->real_cost,
                    'partner'       => $product->partner->name,
                    'partner_name'  => $product->partner->company_name,
                    'type'          => $product->product_type->name,
                    'fat'           => $product->fat,
                    'weight'        => $product->weight,
                    'group'         => $product->group,
                    'pack'          => trans( "product.packs.{$product->product_pack->name}" ),
                    'temperature'   => $product->temperature,
                    'life_time'     => $product->life_time,
                    'limit'         => $product->limit,

                ];
            }
        } );

        if( !$result )
            abort( 404 );

        return $result;

    }

    public function __invoke(Request $request)
    {
        return  $this->render( $this->CreateCustomParams() );
    }
}
