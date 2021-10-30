<?php

namespace Clickbear\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'name',
        'title',
        'ean_number',
        'description'
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
}
