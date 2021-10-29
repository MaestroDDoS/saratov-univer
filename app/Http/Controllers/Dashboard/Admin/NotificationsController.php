<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\BaseController;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NotificationsController extends \App\Http\Controllers\Dashboard\User\NotificationsController
{
    protected string $curpage = "dashboard.user.notifications.index";

    protected function notifications_query(): Builder
    {
        return  Notification::with( [ 'notification_type' ] )->whereNull("user_id");
    }
}
