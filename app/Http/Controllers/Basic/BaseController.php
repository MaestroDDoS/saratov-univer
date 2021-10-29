<?php

namespace App\Http\Controllers\Basic;

use App\Helpers\Utilities;
use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BaseController extends Controller
{
    protected string $curpage;

    protected function initialize($page = null)
    {
        $this->curpage = $this->curpage ?? Utilities::getCurrentPage($page);
    }

    protected function render($params=[])
    {
        if( !$this->curpage )
        {
            abort( 404 );
        }

        return  view( "pages." . $this->curpage . ".content",

            [ 'page' => $this->curpage, 'user' => request()->user() ] + $params

        );
    }
}
