<?php

namespace App\View\Components\Common;

use App\Helpers\Utilities;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;


class Footer extends Component
{

    protected $images_count = 6;

    public $gallery = [];

    public $nav_links = [

        [ 'common.info'		, 'vacancies'       ],
        [ 'common.info'		, 'cooperation'     ],
        [ 'common.info'		, 'quality-policy'  ],
        [ 'common.blog'		,                   ],
        //[ 'dashboard.user.orders'               ],
        [ 'common.shop'		,                   ],
        [ 'common'			, 'contacts'        ],

    ];

    public function __construct()
    {
        Utilities::generateNavigationLinks($this->nav_links);

        $result = Utilities::getArticleImages( -($this->images_count) );

        foreach( $result[ 'data' ] as $key => &$item )
        {
            $idx = $item[ 'idx' ];
            $id  = $item[ 'id'  ];

            $this->gallery[ $key ] = [

				asset( "images/articles/{$id}/src/{$idx}.jpg"   ),
				asset( "images/articles/{$id}/minimal/{$idx}.jpg" ),

            ];
        }
    }

    public function render()
    {
        return view('components.common.footer');
    }
}
