<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\BaseController;
use App\Models\Order;
use App\Models\OrderStatus;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends \App\Http\Controllers\Dashboard\User\OrdersController
{

    protected array $result_params = [ 'id', 'city', 'address', 'status', 'status_text', 'weight', 'cost' ];

    protected function map_item( $item )
    {
        $status = $item->order_status->name;
        $delivery = $item->delivery;

        return [

            'id'            => $item->id,
            'city'          => $delivery ? $delivery["city"] : trans( "common.pickup" ),
            'address'       => $delivery ? "ул. {$delivery['street']} д. {$delivery['building']}" : "",
            'status'        => $status,
            'status_text'   => trans( "order.status.{$status}" ),
            'weight'        => number_format($item->weight, 1, ',', ' '),
            'cost'          => number_format($item->cost, 1, ',', ' '),

        ];
    }

    protected function create_singlepage_params($id)
    {
        return  [

            "order"         => Order::with( [ 'products', 'user' ] )->where( 'id', $id )->first(),
            "status_list"   => OrderStatus::all(),

        ];
    }

    protected function validator( array $data, $id=null )
    {
        return Validator::make( $data, [

            "order_status_id" => ['required', 'numeric', 'exists:order_statuses,id' ],
            "delivery-cost" => ['nullable', 'numeric', 'min:500', 'max:999999' ],

        ] );
    }

    protected function update_result($id): array
    {
        $data = request()->all();
        $validator = $this->validator( $data );

        if( $validator->fails() )
        {
            return [ 'status' => false, 'message' => $validator->messages() ];
        }

        $order = Order::with( [ 'products', 'user' ] )->where( 'id', $id )->first();

        $order->order_status_id = $data[ "order_status_id" ];

        if( ( $delivery = $order->delivery ) && isset( $data[ "delivery-cost" ] ) )
        {
            $delivery[ "cost" ] = $data[ "delivery-cost" ];
            $order->delivery = $delivery;
        }

        $weight = 0;
        $cost   = 0;

        foreach( $order->products as $product )
        {
            if( $count = $data[ "product:{$product->id}" ] ?? null )
            {
                $count = min( max( intval( $count ), 1), $product->limit );

                $weight += $count * $product->weight     * $product->group * 0.001;
                $cost   += $count * $product->info->cost * $product->group;

                $product->info->count = $count;
                $product->info->save();
            }
        }

        $order->update( [ "cost" => $cost, "weight" => $weight ] );

        return  [];
    }
}
