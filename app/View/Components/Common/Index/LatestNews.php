<?php

namespace App\View\Components\Common\Index;

use App\Models\Article;
use Barryvdh\Debugbar\Facade as Debugbar;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class LatestNews extends Component
{

    public $news = [];

    public function __construct()
    {
        $this->news = Cache::remember( 'Index_LatestNews', 60 * 15 ,
            function() { return Article::latest()->limit(3)->get(); }
        );
    }

    public function render()
    {
        return view('components.common.index.latest-news');
    }
}
