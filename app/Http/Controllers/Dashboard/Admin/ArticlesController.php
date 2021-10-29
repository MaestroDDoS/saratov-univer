<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Helpers\Utilities;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\BaseController;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ArticlesController extends BaseController
{
    protected array $result_params = [ 'id', 'title', 'category', 'datetime' ];
    private   array $folders       = [ 'src', 'preview', 'blog', 'minimal', 'gallery' ];
    private   array $crop_images   = [

        'blog'    => [ 830, 449 ],
        'gallery' => [ 370, 315 ],
        'minimal' => [ 106, 104 ],

    ];

    private array $preview_crop = [

        'blog'         => [ 570, 461 ],
        'latest-first' => [ 270, 215 ],
        'latest-other' => [ 270, 215 ],

    ];

    protected function create_searchpage_params(): array
    {
        return [

            'categories' => ArticleCategory::all(),

        ];
    }

    protected function create_array_results(): array
    {
        $query = Article::filter($this->generate_query_params());

        $total = $query->toBase()->getCountForPagination();
        $items = $query->forPage($this->page_idx, $this->per_page)->get()->map( function( $item ) {

            return  [

                'id'            => $item->id,
                'title'         => $item->title,
                'category'      => __( "blog.categories.{$item->article_category->name}" ),
                'datetime'      => $item->created_at->toDateTimeString(),

            ];
        } );

        return ['data' => $items, 'count' => $total];
    }

    protected function validator( array $data )
    {
        return Validator::make( $data, [

            "title"               => ['required', 'string', 'min:2', 'max:32'  ],
            "article_category_id" => ['required', 'exists:article_categories,id'],
            "tinymce_data"        => ['required'],
            "images"              => ['required'],

        ] );
    }

    protected function article_update($article)
    {
        $data = request()->all();

        $article->article_category_id = $data[ "article_category_id" ];
        $article->title = $data[ "title" ];

        $article->save();

        $id = $article->id;

        Storage::put("articles/$id.raw", $data[ "tinymce_data" ] );

        $images = json_decode( $data[ "images" ], true );

        $old_images = File::glob( public_path( "images/articles/{$id}/src/*" ) );
        $img_idx = count( $old_images ) + 1;
        $unused = [];

        foreach( $old_images as $old_image )
        {
            $idx = pathinfo( $old_image, PATHINFO_FILENAME );

            if( !in_array( $idx, $images[ "old" ] ) )
            {
                $unused[] = $idx;
            }
        }

        $path        = "images/articles/{$id}";
        $public_path = public_path( $path );

        foreach( $this->folders as $folder )
        {
            Storage::disk('public')->makeDirectory("$path/$folder/");
        }

        foreach( $images[ "new" ] as $source )
        {
            $idx  = array_shift( $unused ) ?? $img_idx++;

            $img = Image::make( $source )->save( "$public_path/src/{$idx}.jpg",100 );
            $img->backup();

            if( $idx == 1 )
            {
                foreach( $this->preview_crop as $name => $cfg )
                {
                    $img->crop($cfg[0], $cfg[1])->save( public_path( "images/articles/{$id}/preview/{$name}.jpg" ), 100 );
                    $img->reset();
                }
            }

            foreach( $this->crop_images as $folder => $cfg )
            {
                $img->crop($cfg[0], $cfg[1])->save( public_path( "images/articles/{$id}/{$folder}/{$idx}.jpg" ), 100 );
                $img->reset();
            }
        }

        foreach( $unused as $idx )
        {
            $images = File::glob( public_path( "images/articles/{$id}/*/{$idx}.jpg" ) );
            foreach( $images as $image )
            {
                unlink($image);
            }
        }
    }

    protected function update_result($id): array
    {
        $this->article_update( Article::where( "id", $id )->first() ); return [];
    }

    protected function create_result()
    {
        $this->article_update( new Article() ); return [];
    }

    protected function delete_result($id): array
    {
        Article::where( "id", $id )->first()->delete();

        Storage::disk('public')->deleteDirectory("articles/$id");
        Storage::delete("articles/$id.raw");

        return  [];
    }

    protected function create_new_params(): array
    {
        return  [

            "categories" => ArticleCategory::all(),

        ];
    }

    protected function create_singlepage_params($id)
    {
        return  [

            "article"      => Article::where( "id", $id )->first(),
            "categories"   => ArticleCategory::all(),
            'img_count'    => count(Storage::disk('public')->files("images/articles/$id/src/")),
            'tinymce_data' => Utilities::getFileContent("articles/$id.raw"),

        ];
    }
}
