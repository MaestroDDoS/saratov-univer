<?php

namespace App\Models;

use App\Traits\FilterableModelTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partner extends Model
{
    use HasFactory, FilterableModelTrait;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'company_name',
        'slogan',
        'info',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // filters

    public function filter_company_name( Builder $builder, $value )
    {
        $builder->where( "company_name", "like", '%'.$value.'%' );
    }
}
