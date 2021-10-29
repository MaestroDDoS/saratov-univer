<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\AjaxControllerTrait;
use App\Traits\SearchControllerTrait;
use Illuminate\Http\Request;

class BaseController extends \App\Http\Controllers\Basic\BaseController
{
    use AjaxControllerTrait, SearchControllerTrait;

    public function __construct()
    {
        //$this->middleware( [ 'captcha', 'throttle:6,1' ] )->only( [ 'update', 'delete' ] );
        $this->middleware( [ 'throttle:6,1' ] )->only( [ 'update', 'delete' ] );
    }

    public function get(Request $request)
    {
        $this->initialize_page();
        $this->initialize();

        return $this->render( $this->create_searchpage_params() + $this->CreateSearchViewParams() );
    }

    public function post(Request $request)
    {
        $this->initialize_page(); return $this->ajax( [ 'data' => $this->search_result() ] );
    }

    public function show(Request $request, $id)
    {
        $this->initialize(); return $this->render( $this->create_singlepage_params($id) );
    }

    public function create_page(Request $request)
    {
        $this->initialize(); return $this->render( $this->create_new_params() );
    }

    public function create_new(Request $request)
    {
        return  $this->ajax( $this->create_result() );
    }

    public function update(Request $request, $id)
    {
        return  $this->ajax( $this->update_result($id) );
    }

    public function delete(Request $request, $id)
    {
        return  $this->ajax( $this->delete_result($id) );
    }

    // children methods

    protected function create_new_params(): array
    {
        return  [];
    }

    protected function create_searchpage_params(): array
    {
        return [];
    }

    protected function create_array_results(): array
    {
        return  [ 'count' => 0, 'data' => [] ];
    }

    protected function update_result($id): array
    {
        return  [];
    }

    protected function delete_result($id): array
    {
        return  [];
    }

    protected function create_singlepage_params($id)
    {
        return  [];
    }

    protected function create_result()
    {
        return  [];
    }
}
