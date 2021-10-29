<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Helpers\Time;
use App\Helpers\Utilities;
use App\Http\Controllers\Dashboard\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Traits\AjaxControllerTrait;
use App\Traits\SearchControllerTrait;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\Cache;

class OrdersController extends BaseController
{
    protected array $result_params     = [ 'id', 'city', 'status', 'status_text', 'weight', 'cost' ];
    protected array $stringable_params = [ 'status', 'delivery', 'id' ];

    protected function create_searchpage_params(): array
    {
        return [

            'order_status_list' => OrderStatus::select( "name" )->pluck('name'),

        ];
    }

    protected function map_item( $item )
    {
        $status = $item->order_status->name;
        $delivery = $item->delivery;

        return [

            'id'            => $item->id,
            'city'          => $delivery ? $delivery["city"] : trans( "common.pickup" ),
            'status'        => $status,
            'status_text'   => trans( "order.status.{$status}" ),
            'weight'        => number_format($item->weight, 1, ',', ' '),
            'cost'          => number_format($item->cost, 1, ',', ' '),

        ];
    }

    protected function create_array_results(): array
    {
        $user        = request()->user();
        $order_query = Order::where("user_id", $user->id)->filter($this->generate_query_params());

        $total = $order_query->toBase()->getCountForPagination();

        $list = $order_query->forPage($this->page_idx, $this->per_page)->get()->map( function( $item ) {

            return $this->map_item( $item );

        } );

        return ['data' => $list, 'count' => $total];
    }

    protected function delete_result($id): array
    {
        $order = Order::where( "id", $id )->first(["id", "order_status_id"]);

        if( !$order || !$order->canRemove() )
        {
            return  [ "status" => false, "message" => trans( "dashboard.remove_failed" ) ];
        }

        $order->products()->detach();
        $order->delete();

        return  [ "href" => route( "dashboard.user.orders" ) ];
    }

    protected function create_singlepage_params($id)
    {
        return  [

            "order" => Order::with( [ 'products' ] )->where( 'id', $id )->first(),

        ];
    }
}
