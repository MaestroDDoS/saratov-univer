<?php

namespace App\View\Components\Common\Index;

use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use App\Models\Partner;

class Partners extends Component
{

    public $partners = [];

    public function __construct()
    {
        $this->partners = Cache::rememberForever( 'Partners', function(){ return Partner::all(); } );
    }

    public function render()
    {
        return view('components.common.index.partners');
    }
}
