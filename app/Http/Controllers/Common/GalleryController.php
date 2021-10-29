<?php

namespace App\Http\Controllers\Common;

use App\Helpers\Utilities;
use App\Http\Controllers\Basic\SearchController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends SearchController
{
    protected array $result_params = ['id', 'idx', 'title', 'category'];

    protected function create_array_results(): array
    {
        $result = Utilities::getArticleImages( ( $this->page_idx - 1 ) * $this->per_page, $this->per_page );

        foreach( $result[ 'data' ] as $key => &$item )
        {
            $idx = $item[ 'idx' ];
            $id  = $item[ 'id'  ];

            $item[ 'title' ]    = "article title $id";
            $item[ 'category' ] = "article category $id";
        }

        return  $result;
    }
}
