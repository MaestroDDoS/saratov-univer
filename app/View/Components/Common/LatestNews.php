<?php

namespace App\View\Components\Common;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;
use Barryvdh\Debugbar\Facade as Debugbar;

class LatestNews extends Component
{

    public $news = [];
    public $latest_months = [];

    public function __construct()
    {
        $this->news = Cache::remember( 'Info_LatestNews_'.app()->getLocale(), 60 * 15, function() {

            return Article::latest()->limit(2)->get();

        } );

        $this->latest_months = Cache::remember( 'Info_LatestMonths', 60 * 15, function() {

            $result = [];

            $months = Article::query()
                ->select(
                    DB::raw('count(id) as `count`'),
                    DB::raw('YEAR(created_at) year'),
                    DB::raw('MONTH(created_at) month')
                )
                ->groupBy(
                    DB::raw('YEAR(created_at)'),
                    DB::raw('MONTH(created_at)')
                )
                ->orderByDesc( 'year' )
                ->orderByDesc( 'month' )
                ->take(4)
                ->get();

            foreach($months as $key => $month)
            {
                $date = Carbon::create( $month['year'], $month['month'] );

                $result[ $key ] = [

                    $date->format('Y-m'),
                    $date->formatLocalized('%B %Y')

                ];
            }

            return  $result;

        } );
    }

    public function render()
    {
        return view('components.common.latest-news');
    }
}
