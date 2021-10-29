<?php

namespace App\Models;

use App\Traits\FilterableModelTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Barryvdh\Debugbar\Facade as Debugbar;
use Jawira\CaseConverter\Convert;

class Notification extends Model
{
    use HasFactory, FilterableModelTrait;

    protected $fillable = [
        'notification_type_id',
        'user_id',
        'checked',
        'info',
    ];

    protected $casts = [ 'info' => 'array' ];

    // methods

    public function markAsRead()
    {
        $this->update( [ 'checked' => true ] );
    }

    public function generate_info()
    {
        $method = "generate_".(new Convert($this->notification_type->name))->toSnake()."_info";
        Debugbar::log( $method );
        if( method_exists( $this, $method ) )
        {
            return  call_user_func_array( [ $this, $method ], [] );
        }
    }

    // generators

    protected function route( $url )
    {
        if( !$this->checked )
        {
            return  "$url?read={$this->id}";
        }
        return $url;
    }

    protected function generate_new_order_info()
    {
        $order_id = $this->info['order_id'];

        return  [

            "title" => trans( "notifications.new_order", [ "id" => $order_id ] ),
            "href"  => $this->route( route( "dashboard.admin.orders.show", $order_id ) ),

        ];
    }

    protected function generate_order_change_status_info()
    {
        $order_id     = $this->info['order_id'];
        $order_status = $this->info['order_status'];

        return  [

            "title" => trans( "notifications.order_change_status", [

                "id" => $order_id,
                "status" => trans( "order.status.{$order_status}" )

            ] ),

            "href" => $this->route( route("dashboard.user.orders.show", $order_id ) ),

        ];
    }

    // relations

    public function notification_type(): BelongsTo
    {
        return $this->belongsTo(NotificationType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //scopes

    public function scopeChecked( Builder $builder, $bool)
    {
        $builder->where( 'checked', $bool );
    }

    public function scopeForAdmin( Builder $builder )
    {
        $builder->whereNull( 'user_id' );
    }

    public function scopeForUser( Builder $builder, $user_id )
    {
        $builder->where( 'user_id', $user_id );
    }

    // filters

    public function filter_datetime( Builder $builder, $value )
    {
        $this->filter_date($builder, $value, "Y-m");
    }
}
