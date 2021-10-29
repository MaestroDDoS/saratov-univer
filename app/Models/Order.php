<?php

namespace App\Models;

use App\Traits\FilterableModelTrait;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory, FilterableModelTrait;

    protected $fillable = [

        'user_id',
        'order_status_id',
        'weight',
        'cost',
        'address',

    ];

    protected $with  = [ 'order_status' ];
    protected $casts = ['delivery' => 'array'];

    // scopes

    public function scopeCanRemove()
    {
        return  $this->order_status->id <= OrderStatus::select( "id" )->where( "name", OrderStatus::$payment_status )->pluck( "id" )[0];
    }

    public function scopeneedPayment()
    {
        return  $this->order_status->id == OrderStatus::select( "id" )->where( "name", OrderStatus::$payment_status )->pluck( "id" )[0];
    }

    // relations

    public function order_status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->as('info')->withPivot( ['count', 'cost'] );
    }

    //filters

    public function filter_status( Builder $builder, $value )
    {
        $builder->whereHas('order_status', function( $query ) use( $value ) { $query->where('name', $value); } );
    }

    public function filter_id( Builder $builder, $value )
    {
        $this->filter_id_like($builder, $value);
    }

    public function filter_delivery( Builder $builder, $value )
    {
        return  $builder->{"where".( $value != 'false' ? 'Not' : '' )."Null"}('delivery');
    }
}
