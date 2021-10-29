<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Helpers\Time;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\BaseController;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Barryvdh\Debugbar\Facade as Debugbar;

class NotificationsController extends BaseController
{
    protected $template = "dashboard.notifications";

    protected array $result_params     = [ 'title', 'date', 'href', 'checked' ];
    protected array $stringable_params = [ 'datetime' ];

    protected function notifications_query(): Builder
    {
        return  Notification::with( [ 'notification_type' ] )->where("user_id", request()->user()->id);
    }

    protected function create_array_results(): array
    {
        $notify_query = $this->notifications_query()->filter($this->generate_query_params())->orderBy( 'checked' );

        $total = $notify_query->toBase()->getCountForPagination();
        $list  = $notify_query->forPage($this->page_idx, $this->per_page)->get()->map( function( $item ){

            return  $item->generate_info() + [

                "date"    => $item->created_at->toDateTimeString(),
                "checked" => "$item->checked"

            ];
        } );

        return ['data' => $list, 'count' => $total];
    }
}
