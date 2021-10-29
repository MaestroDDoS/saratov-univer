<?php

namespace App\View\Components\Common\Blog;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Barryvdh\Debugbar\Facade as Debugbar;

class AsideNavbar extends Component
{

    public $nav_links = [];
    public $current_category;

    public function __construct()
    {
        $this->current_category = request()->query('category', '');

        $this->nav_links = Cache::remember( 'BlogArticleCategories', 60 * 15, function() {

            $total = Article::query()->toBase()->getCountForPagination();
            $categories = ArticleCategory::withCount( 'articles' )->get();

            $result = [ [ '', $total ] ];

            foreach( $categories as $category)
            {
                $result[] = [ $category->name, $category->articles_count ];
            }

            return  $result;

        } );
    }

    public function render()
    {
        return view('components.common.blog.aside-navbar');
    }
}
