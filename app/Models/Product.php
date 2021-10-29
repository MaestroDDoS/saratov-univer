<?php

namespace App\Models;



use App\Traits\FilterableModelTrait;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory, FilterableModelTrait;

    protected $fillable = [
        'title',
        'partner_id',
        'product_type_id',
        'product_pack_id',
        'product_status_id',
        'cost',
        'new_cost',
        'group',
        'fat',
        'weight',
        'temperature',
        'life_time',
        'limit',
    ];

    protected $order_fields = [ 'title', 'cost' ];

    protected $with = [

        'partner',
        'product_type',
        'product_status',

    ];

    // custom functions

    public function getRealCostAttribute()
    {
        //return  $this->product_status_id != 2 ? $this->cost : $this->new_cost;
        return  $this->new_cost ?? $this->cost;
    }

    // relations

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->as('info')->withPivot( ['count', 'cost'] );
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function product_type(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    public function product_pack(): BelongsTo
    {
        return $this->belongsTo(ProductPack::class);
    }

    public function product_status(): BelongsTo
    {
        return $this->belongsTo(ProductStatus::class);
    }

    //filters

    public function filter_type( Builder $builder, $value )
    {
        $builder->whereHas('product_type', function( $query ) use( $value ) { $query->whereIn('name', $value); } );
    }

    public function filter_partner( Builder $builder, $value )
    {
        $builder->whereHas('partner', function( $query ) use( $value ) { $query->whereIn('name', $value); } );
    }

    public function filter_status( Builder $builder, $value )
    {
        $builder->whereHas('product_status', function( $query ) use( $value ) { $query->whereIn('name', $value); } );
    }

    public function filter_cost( Builder $builder, $value )
    {
        $this->filter_between( $builder, $value, 'cost' );
    }

    public function filter_weight( Builder $builder, $value )
    {
        $this->filter_between( $builder, $value, 'weight' );
    }

    public function filter_title( Builder $builder, $value )
    {
        $builder->where( "title", "like", '%'.$value.'%' );
    }

    public function order_by_cost( Builder $builder, $value )
    {
        $builder->orderByRaw( DB::raw( 'COALESCE( new_cost, cost )' ) );
    }

    //maps

    public function scopeMapProductCardItems(): Closure
    {
        return function( $item )
        {

            $array = [

                'id'            => $item->id,
                'name'          => $item->title,
                'status'        => $item->product_status->name,
                'status_title'  => trans( "product.status.{$item->product_status->name}" ),
                'cost'          => $item->cost,
                'new_cost'      => $item->new_cost,
                'partner_name'  => $item->partner->company_name,
                'weight'        => $item->weight,
                'group'         => $item->group,

            ];

            if( !$item->new_cost )
            {
                $array[ 'new_cost' ] = $item->cost;
                $array[ 'cost' ]     = null;
            }

            return  $array;
        };
    }
}
