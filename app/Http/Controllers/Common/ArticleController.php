<?php

namespace App\Http\Controllers\Common;

use App\Helpers\Time;
use App\Helpers\Utilities;
use App\Http\Controllers\Basic\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class ArticleController extends StaticPageController
{
    protected function CreateCustomParams(): array
    {
        $id = Route::current()->parameter( 'id' );

        $result = Cache::remember( "article_info_{$id}_".app()->getLocale(), 60 * 15, function() use($id) {

            $article = Article::with( ['article_category'] )->find( $id );

            if( $article )
            {
                return [

                    'datetime'      => $article->created_at->formatLocalized('%B %d, %Y'),
                    'category'      => $article->article_category->name,
                    'title'         => $article->title,
                    'img_count'     => count(Storage::disk('public')->files("images/articles/$id/src/")),
                    'tinymce_data'  => Utilities::getFileContent("articles/$id.raw"),
                    'id'            => $id,

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
