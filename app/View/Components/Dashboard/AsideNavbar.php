<?php

namespace App\View\Components\Dashboard;

use App\Enums\UserPermissions;
use App\Helpers\Utilities;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Barryvdh\Debugbar\Facade as Debugbar;

class AsideNavbar extends Component
{

    public $page;

    public $nav_links = [

        'list' => [

            'admin' => [

                [ 'products'     , 'cube29'         ],
                [ 'partners'     , 'favourites5'    ],
                [ 'orders'       , 'text109'        ],
                [ 'users'        , 'user143'        ],
                [ 'articles'     , 'note35'         ],

            ],

            'user' => [

                [ 'orders'       , 'text109'        ],
                [ 'profile'      , 'user143'        ],

            ]
        ],

//        'alts' => [
//
//            'admin' => [
//
//                [ 'user.profile' , 'portfolio23' ],
//
//            ],
//
//            'user' => [
//
//                [ 'admin.orders' , 'portfolio23' ],
//
//            ]
//        ]
    ];

    protected function generate_list( &$links, $link, $icon, $count=null )
    {
        $links[] = [ route( $link ), Utilities::getRoutePage( $link ), $icon, $count ];
    }

    public function __construct($page)
    {
        $this->page  = $page;
        $access_type = Utilities::access_type();
        $user        = request()->user();

        $links = [];

        foreach( $this->nav_links[ 'list' ][ $access_type ] as $idx => $nav_link )
        {
            if( $access_type != 'admin' || $user->hasPermissions( UserPermissions::getValue( "Read".Str::studly( $nav_link[0] ) ) ) )
            {
                $this->generate_list($links['list'], "dashboard.{$access_type}.{$nav_link[0]}", $nav_link[1]);
            }
        }

        //notifications
        $this->generate_list(

            $links['list'],
            "dashboard.{$access_type}.notifications",
            'notification5',
            Utilities::getUncheckedNotifications( $access_type )

        );

        if( $user->is_admin )
        {
            if( $access_type != 'user' )
            {
                $this->generate_list( $links[ 'alts' ], "dashboard.user.profile", 'portfolio23' );
            }
            else
            {
                foreach( $this->nav_links[ 'list' ][ 'admin' ] as $idx => $nav_link )
                {
                    if( $user->hasPermissions( UserPermissions::getValue( "Read".Str::studly( $nav_link[0] ) ) ) )
                    {
                        $this->generate_list( $links[ 'alts' ], "dashboard.admin.{$nav_link[0]}", $nav_link[1] );
                    }
                }
            }
        }

        $this->nav_links = $links;
    }

    public function render()
    {
        return view('components.dashboard.aside-navbar');
    }
}
