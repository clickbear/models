<?php

namespace Clickbear\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProductToCategoryModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'product_to_category';

    /**
     * Enable or disable timestamps, be sure they exist...
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Enable or disable auto increment
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'category_id',
    ];

    /**
     * Related product category
     */
    public function category() {
        return $this->hasOne(ProductToCategoryModel::class, 'id', 'category_id');
    }

}
