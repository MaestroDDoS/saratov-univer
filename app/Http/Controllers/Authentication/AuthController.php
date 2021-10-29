<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Common\StaticPageController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends StaticPageController
{
    public function __construct()
    {
        $this->middleware( 'guest' );
        parent::__construct();
    }
}
