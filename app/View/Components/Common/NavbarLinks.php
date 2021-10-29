<?php

namespace App\View\Components\Common;

use App\Helpers\Utilities;
use Illuminate\Support\Facades\Lang;
use Illuminate\View\Component;

class NavbarLinks extends Component
{

    public $shopcart_items_count = 0;
    public $page;

    public $nav_links = [

        "main" => [

            [ 'common' 	        , 'index'     ],
            [ 'common'          , 'about-us'  ],
            [ 'common.info' 	, 'vacancies' ],
            [ 'common.shop' 	,             ],

        ],

        "dropdown" => [

            [ 'common.info'		, 'vacancies'       ],
            [ 'common.info'		, 'cooperation'     ],
            [ 'common.info'		, 'quality-policy'  ],
            [ 'common.blog'		                    ],
            //[ 'dashboard.user.orders'               ],
            [ 'common.shop' 	                    ],
            [ 'common'			, 'contacts'        ],

        ]
    ];

    public function __construct( $page )
    {
        $this->shopcart_items_count = count( Utilities::getShopCartItems() );
        $this->page = $page;

        foreach( $this->nav_links as $key => &$list )
        {
            Utilities::generateNavigationLinks($list);
        }
    }

    public function render()
    {
        return view('components.common.navbar-links');
    }
}
