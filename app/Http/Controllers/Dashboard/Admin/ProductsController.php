<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Dashboard\BaseController;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductPack;
use App\Models\ProductStatus;
use App\Models\ProductType;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;


class ProductsController extends BaseController
{
    protected array $result_params     = [ 'id', 'partner', 'title', 'group', 'weight', 'cost', 'total_weight', 'total_cost' ];
    protected array $stringable_params = [ 'title' ];

    protected function create_searchpage_params(): array
    {
        return [

            'partners'      => Partner::all(),
            'product_types' => ProductType::all(),

        ];
    }

    protected function create_array_results(): array
    {

        $products_query = Product::filter($this->generate_query_params());

        $total    = $products_query->toBase()->getCountForPagination();
        $products = $products_query->forPage($this->page_idx, $this->per_page)->get()->map( function( $item ){

            return  [

                'id'            => $item->id,
                'partner'       => $item->partner->company_name,
                'title'         => $item->title,
                'group'         => $item->group,
                'weight'        => $item->weight,
                'cost'          => $item->real_cost,
                'total_weight'  => number_format($item->weight * 0.01 * $item->group, 1, ',', ' '),
                'total_cost'    => number_format($item->real_cost * $item->group, 1, ',', ' '),

            ];

        } );

        return ['data' => $products, 'count' => $total];
    }

    protected function delete_result($id): array
    {
        Product::where( "id", $id )->first()->delete();
        Storage::deleteDirectory("public/images/$id");

        return [ 'href' => route( 'dashboard.admin.products' ) ];
    }

    protected function get_singlepage_params()
    {
        return  [

            'product_types'     => ProductType::all(),
            'partners'          => Partner::all(),
            'product_packs'     => ProductPack::all(),
            'product_statuses'  => ProductStatus::all(),

        ];
    }

    protected function validator( array $data )
    {
        return Validator::make( $data, [

            "title"             => ['required', 'string', 'min:2', 'max:32'  ],

            "partner_id"        => ['required', 'exists:partners,id'         ],
            "product_type_id"   => ['required', 'exists:product_types,id'    ],
            "product_pack_id"   => ['required', 'exists:product_packs,id'    ],
            "product_status_id" => ['required', 'exists:product_statuses,id' ],

            "new_cost"          => ['required', 'numeric', 'min:1', 'max:999'  ],
            "cost"              => ['required', 'numeric', 'min:1', 'max:999'  ],
            "group"             => ['required', 'numeric', 'min:1', 'max:999'  ],
            "fat"               => ['required', 'numeric', 'min:1', 'max:999'  ],
            "weight"            => ['required', 'numeric', 'min:1', 'max:9999' ],
            "temperature"       => ['required', 'numeric', 'min:1', 'max:999'  ],
            "life_time"         => ['required', 'numeric', 'min:1', 'max:999'  ],
            "limit"             => ['required', 'numeric', 'min:1', 'max:999'  ],

            "image"             => ['nullable', 'image', 'dimensions:min_width=512,min_height=512,max_width=1024,max_height=1024'],

        ] );
    }

    protected function update_item( $item=null )
    {
        $data      = request()->all();
        $validator = $this->validator( $data );

        if( $validator->fails() )
        {
            return [ 'status' => false, 'message' => $validator->messages() ];
        }

        $not_sale = $data[ "product_status_id" ] != 2;

        if( $not_sale )
        {
            unset( $data[ "new_cost" ] );
        }

        if( !$item ) {

            $item = Product::create( $data );

        } else {

            if( $not_sale )
            {
                $item->new_cost = null;
            }

            $item->update( $data );

        }

        if( $image = $data[ "image" ] ?? null )
        {
            $img = Image::make( $image );

            $path = "images/products/$item->id";
            $public_path = public_path( $path );

            Storage::disk('public')->makeDirectory($path);

            $img->resize(512, 512)->save("$public_path/full.png"  , 100 );
            $img->resize(256, 256)->save("$public_path/medium.png", 100 );
            $img->resize(128, 128)->save("$public_path/small.png" , 100 );

        }
    }

    protected function create_new_params(): array
    {
        return  $this->get_singlepage_params();
    }

    protected function create_singlepage_params($id)
    {
        return  $this->get_singlepage_params() + [

            'item' => Product::where( "id", $id )->first(),

        ];
    }

    protected function create_result()
    {
        return  $this->update_item() ?? [];
    }

    protected function update_result($id): array
    {
        return  $this->update_item( Product::find( $id ) ) ?? [];
    }
}
