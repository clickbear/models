<?php

namespace Clickbear\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ean_number',
        'slug'
    ];

    public function categories() {
        return $this->hasManyThrough(
            ProductCategoryModel::class,
            ProductToCategoryModel::class,
            'category_id',
            'product_id',
            'id',
            'id'
        );
    }

    public function description(): HasOne
    {
        return $this->hasOne(ProductDescriptionModel::class, 'product_id', 'id');
    }
}
