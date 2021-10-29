<?php

namespace App\View\Components\Common\Info;

use App\Helpers\Utilities;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class AsideNavbar extends Component
{

    public $page;

    public $nav_links = [

        'about-products',
        'cooperation',
        'distribution',
        'quality-policy',
        'retail',
        'stm',
        'tenders',
        'vacancies',

    ];

    public function __construct( $page )
    {
        $this->page = $page;

        foreach( $this->nav_links as $key => $link )
        {
            $this->nav_links[$key] = [ route( Route::currentRouteName(), $link ), Utilities::getCurrentPage( $link ) ];
        }
    }

    public function render()
    {
        return view('components.common.info.aside-navbar');
    }
}
