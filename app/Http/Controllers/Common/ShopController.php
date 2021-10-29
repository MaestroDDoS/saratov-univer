<?php

namespace App\Http\Controllers\Common;

use App\Helpers\Utilities;
use App\Http\Controllers\Basic\SearchController;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Barryvdh\Debugbar\Facade as Debugbar;

class ShopController extends SearchController
{
    protected        $template      = 'common.product';
    protected array  $slider_params = ['cost', 'weight'];

    protected array  $result_params = [

        'id',
        'name',
        'status',
        'status_title',
        'cost',
        'new_cost',
        'partner_name',
        'weight',
        'group',

    ];

    protected function create_array_results(): array
    {
        return Cache::remember( Utilities::uid_from_query($this, 'shop_query'), 60 * 15, function() {

            $products_query = Product::filter($this->query_params);

            $total    = $products_query->toBase()->getCountForPagination();
            $products = $products_query->forPage($this->page_idx, $this->per_page)->get()->map(Product::mapProductCardItems());

            return ['data' => $products, 'count' => $total];

        } );
    }

    protected function CreateSearchViewParams(): array
    {
        $this->generate_query_params();
        $default = parent::CreateSearchViewParams();

        $shop_filter = Cache::remember( 'ShopFilter', 60 * 15 , function() {

            $product_types = ProductType::select( ['name'] )->withCount('products')->get()->toArray();
            $partners      = Partner::select( [ 'name', 'company_name' ] )->withCount('products')->get()->toArray();

            $products_query = Product::query();
            $products_count = $products_query->count();

            return  [

                'cost' => [

                    $products_query->min('cost'),
                    $products_query->max('cost'),

                ],

                'weight' => [

                    $products_query->min('weight'),
                    $products_query->max('weight'),

                ],

                'filter' => [

                    'partner' => array_merge( [ [ 'products_count' => $products_count, 'company_name' => __( 'common.all' ) ] ], $partners ),
                    'type'    => array_merge( [ [ 'products_count' => $products_count ] ], $product_types ),

                ]
            ] ;
        } );

        foreach( $this->slider_params as $param )
        {
            $shop_filter[ $param ] += [

                2 => Arr::get( $this->query_params, "$param.0" ),
                3 => Arr::get( $this->query_params, "$param.1" ),

            ];
        }

        return  $default + $shop_filter;
    }
}
