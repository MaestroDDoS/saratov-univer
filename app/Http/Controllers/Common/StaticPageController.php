<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Basic\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class StaticPageController extends BaseController
{
    public function __construct()
    {
        $this->initialize( Route::getCurrentRoute()?->parameter( 'page' ) );
    }

    public function __invoke(Request $request)
    {
        return  $this->render();
    }
}
