<?php

namespace Clickbear\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
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

    /**
     * Get the related categories
     *
     * @return HasManyThrough
     */
    public function categories(): HasManyThrough
    {
        return $this->hasManyThrough(
            ProductCategoryModel::class,
            ProductToCategoryModel::class,
            'category_id',
            'product_id',
            'id',
            'id'
        );
    }

    /**
     * Get the description of the product
     *
     * @return HasOne
     */
    public function description(): HasOne
    {
        return $this->hasOne(ProductDescriptionModel::class, 'product_id', 'id');
    }

    /**
     * Get the default image of the product
     *
     * @return HasOne
     */
    public function defaultImage(): HasOne
    {
        return $this->hasOne(ProductImageModel::class, 'product_id', 'id')->where('type', 'default');
    }

    /**
     * Get the best price available
     *
     * @return HasOne
     */
    public function bestprice(): HasOne
    {
        return $this->hasOne(ProductPriceModel::class, 'product_id', 'id')->orderBy('price', 'desc')->limit(1);
    }

    /**
     * Get the prices of the product
     *
     * @return HasMany
     */
    public function prices()
    {
        return $this->hasMany(ProductPriceModel::class, 'product_id', 'id')->orderBy('price', 'desc');
    }
}
