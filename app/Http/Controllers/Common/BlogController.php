<?php

namespace App\Http\Controllers\Common;

use App\Helpers\Time;
use App\Helpers\Utilities;
use App\Http\Controllers\Basic\SearchController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Html2Text\Html2Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class BlogController extends SearchController
{
    protected int   $per_page      = 3;
    protected array $result_params = [ 'category', 'datetime', 'title', 'id', 'text' ];

    protected function create_array_results(): array
    {
        $result = Cache::remember( Utilities::uid_from_query($this, 'blog_articles'), 15 * 60, function() {

            $query = Article::with( 'article_category' )->filter( $this->query_params )->latest();

            $total    = $query->toBase()->getCountForPagination();
            $articles = $query->forPage($this->page_idx, $this->per_page)->get()->map(
                function( $item )
                {
                    return [

                        'category' => $item->article_category->name,
                        'datetime' => $item->created_at,
                        'title'    => $item->title,
                        'id'       => $item->id,
                        'text'     => Str::limit(
                            ( new Html2Text( Utilities::getFileContent("articles/{$item->id}.raw") ) )->getText(),
                            200
                        ),
                    ];
                }
            );

            return  [ 'count' => $total, 'data' => $articles->toArray() ];

        } );

        foreach( $result['data'] as &$article )
        {
            $article['category'] = trans( "blog.categories.{$article['category']}" );
            $article['datetime'] = $article['datetime']->formatLocalized('%B %d, %Y');
        }

        return $result;
    }
}
