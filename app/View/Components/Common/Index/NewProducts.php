<?php

namespace App\View\Components\Common\Index;

use App\Helpers\Utilities;
use Barryvdh\Debugbar\Facade as Debugbar;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class NewProducts extends Component
{

    public $products = [];
    public $template = 'common.product';
    public $products_limit = 9;

    public function __construct()
    {
        $this->products = Cache::remember( 'Index_ProductsNew_'.app()->getLocale(), 60 * 15, function() {

            return  Product::filter( [ 'status' => [ 'new' ] ] )
                ->limit( $this->products_limit )
                ->get()
                ->map( Product::mapProductCardItems() )->toArray();

        } );
    }

    public function render()
    {
        return view('components.common.index.new-products');
    }
}
