<?php

namespace App\Models;

use App\Traits\FilterableModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory, FilterableModelTrait;

    protected $fillable = [
        'title',
        'article_category_id',
    ];

    // relations

    public function article_category(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    // filters

    public function filter_category( Builder $builder, $value )
    {
        $builder->whereHas('article_category', function( $query ) use( $value ) { $query->whereIn('name', $value); } );
    }

    public function filter_datetime( Builder $builder, $value )
    {
        $this->filter_date($builder, $value, "Y-m");
    }
}
