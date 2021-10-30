<?php

namespace Clickbear\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'priority',
        'slug',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'parent_id'
    ];

    /**
     * Get the items of this category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function items() {
        return $this->hasManyThrough(
            ProductToCategoryModel::class,
            ProductModel::class,
            'product_id',
            'category_id',
            'id',
            'id'
        );
    }

    public function parent() {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

}
