<?php

namespace App\Traits;

use Carbon\Carbon;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;

trait SearchControllerTrait {

    protected       $template      = null;
    protected array $result_params = [];
    protected int   $per_page      = 9;
    protected int   $page_idx      = 0;

    protected bool   $query_params_done = false;
    protected array  $query_params = [];

    protected array  $stringable_params = [ 'page', 'sort', 'datetime' ];

    public function generate_query_params(): array
    {
        if( $this->query_params_done )
        {
            return  $this->query_params;
        }

        $this->query_params_done = true;

        foreach( request()->all() as $type => $param)
        {
            if( is_string( $param ) && !in_array( $type, $this->stringable_params ) )
                $param = explode(' ', $param);

            $this->query_params[$type] = $param;
        }

        return  $this->query_params;
    }

    protected function create_array_results(): array
    {
        return  [ 'count' => 0, 'data' => [] ];
    }

    protected function search_result(): LengthAwarePaginator
    {
        $result = $this->create_array_results();

        return  new LengthAwarePaginator(

            $result['data'],
            $result['count'],

            $this->per_page,
            $this->page_idx,

            [
                'path' => request()->url()
            ]
        );
    }

    protected function initialize_page()
    {
        $this->page_idx = LengthAwarePaginator::resolveCurrentPage();
    }

    protected function CreateSearchViewParams(): array
    {
        $template = $this->template ?? Route::currentRouteName();
        $template_params = [];

        foreach( $this->result_params as $param )
        {
            $template_params[ $param ] = '${' . $param . '}';
        }

        return  [

            'template'        => $template,
            'template_params' => $template_params,
            'query_params'    => $this->query_params,
            'paginator'       => $this->search_result(),

        ];
    }
}


