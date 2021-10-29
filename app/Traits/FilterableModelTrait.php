<?php

namespace App\Traits;

use Carbon\Carbon;
use Barryvdh\Debugbar\Facade as Debugbar;
use \Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

trait FilterableModelTrait {

    public function filter_id( Builder $builder, $value )
    {
        $builder->whereIn('id', $value );
    }

    public function filter_id_like( Builder $builder, $value )
    {
        $builder->where( DB::raw('CAST(id AS CHAR)'), 'like', $value );
    }

    private function filter_between( Builder $builder, $value, $column )
    {
        $a = array_pop( $value );
        $b = array_pop( $value );

        if( is_numeric( $a ) )
        {
            if( is_numeric( $b ) )
            {
                $builder->where($column, '<=', $a);
                $a = $b;
            }
            $builder->where($column, '>=', $a);
        }
    }

    private function filter_date( Builder $builder, $value, $format='Y-m' )
    {
        try
        {
            $date = Carbon::createFromFormat($format, $value);

            $builder->whereBetween('created_at', [

                $date->startOfMonth()->format('Y-m-d H:i:s'),
                $date->endOfMonth()  ->format('Y-m-d H:i:s'),

            ] );
        }
        catch( Exception $e )
        {
            // nothing
        }
    }

    private function filter_sort( Builder $builder, $value )
    {
        if( in_array( $value, $this->order_fields ) )
        {
            if( method_exists( $this, "order_by_$value" ) )
            {
                return  call_user_func_array( [ $this, "order_by_$value" ], [ $builder, $value ] );
            }
            $builder->orderBy($value, 'asc');
        }
    }

    public function scopeFilter(Builder $builder, $filter): Builder
    {
        foreach( $filter as $name => $value )
        {
            if( $value && method_exists( $this, "filter_$name" ) )
            {
                call_user_func_array( [ $this, "filter_$name" ], [ $builder, $value ] );
            }
        }
        return $builder;
    }
}


