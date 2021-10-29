<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Traits\SearchControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;

class SearchController extends AjaxController
{
    use SearchControllerTrait;

    public function __construct()
    {
        $this->initialize_page();
    }

    protected function ajax_result(): array
    {
        return [ 'data' => $this->search_result() ];
    }

    protected  function CreateCustomParams(): array
    {
        return $this->CreateSearchViewParams();
    }
}
