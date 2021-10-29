<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\BaseController;
use App\Models\Partner;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class PartnersController extends BaseController
{

    protected array $result_params     = [ 'id', 'company_name', 'name', 'slogan' ];
    protected array $stringable_params = [ 'company_name' ];

    protected function create_array_results(): array
    {
        $query = Partner::filter($this->generate_query_params());

        $total = $query->toBase()->getCountForPagination();
        $items = $query->forPage($this->page_idx, $this->per_page)->get()->map( function( $item ) {

            return  [

                'id'            => $item->id,
                'name'          => $item->name,
                'company_name'  => $item->company_name,
                'slogan'        => $item->slogan,

            ];
        } );

        return ['data' => $items, 'count' => $total];
    }

    protected function validator( array $data, $id=null )
    {
        return Validator::make( $data, [

            "name"          => ['required', 'string', 'min:2', 'max:5', 'unique:partners,name'.( $id ? ",$id" : "" ) ],

            "company_name"  => ['required', 'string', 'min:2', 'max:32'  ],
            "slogan"        => ['required', 'string', 'min:2', 'max:128' ],
            "info"          => ['required', 'string', 'min:2', 'max:255' ],

            "image"         => ['nullable', 'image', 'dimensions:min_width=250,min_height=150,max_width=500,max_height=300'],

        ] );
    }

    protected function update_item( $item=null )
    {
        $data      = request()->all();
        $validator = $this->validator( $data, $item?->id );

        if( $validator->fails() )
        {
            return [ 'status' => false, 'message' => $validator->messages() ];
        }

        if( !$item )
            $item = Partner::create( $data );

        else
            $item->update( $data );

        if( $image = $data[ "image" ] ?? null )
        {
            Storage::makeDirectory( "public/images/partners/" );
            Image::make( $image )->resize(250, 150)->save(public_path( "images/partners/$item->name.png" ), 100 );
        }
    }

    protected function delete_result($id): array
    {
        Partner::where( "id", $id )->first()->delete();
        Storage::delete("public/images/partners/$id.png");

        return [ 'href' => route( 'dashboard.admin.partners' ) ];
    }

    protected function create_singlepage_params($id)
    {
        return  [

            'item' => Partner::where( "id", $id )->first(),

        ];
    }

    protected function create_result()
    {
        return  $this->update_item() ?? [];
    }

    protected function update_result($id): array
    {
        return  $this->update_item( Partner::find( $id ) ) ?? [];
    }
}
