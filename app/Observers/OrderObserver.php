<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderStatus;
use Barryvdh\Debugbar\Facade as Debugbar;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        Notification::create( [

            'notification_type_id' => 1,
            'info' => [ 'order_id' => $order->id ],

        ] );
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        if( $status = $order->getChanges()[ "order_status_id" ] ?? null )
        {
            Notification::create( [

                'user_id' => $order->user_id,
                'notification_type_id' => 2,

                'info' => [
                    'order_id' => $order->id,
                    'order_status' => OrderStatus::find( $status )->name
                ],
            ] );
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
