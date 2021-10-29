<?php

namespace App\View\Components\Common\AboutUs;

use Illuminate\View\Component;

class Counter extends Component
{

    public $counter = [

        [ 'type-1', 1 ],
        [ 'type-2', 1 ],
        [ 'type-3', 1 ],

    ];

    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.common.about-us.counter');
    }
}
