<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Traits\AjaxControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AjaxController extends BaseController
{
    use AjaxControllerTrait;

    public function get(Request $request)
    {
        $this->initialize(); return $this->render( $this->CreateCustomParams() );
    }

    public function post(Request $request)
    {
        return  $this->ajax( $this->ajax_result() );
    }
}
