<?php

namespace Clickbear\Models\Supplier;

use Clickbear\Models\Admin\FeedTemplateModel;
use Clickbear\Models\Catalog\Discount\DiscountCodeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplierModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'suppliers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'logo_path',
        'website_url'
    ];

    /**
     * Get all discount codes of the supplier
     *
     * @return HasMany
     */
    public function discountCodes(): HasMany
    {
        return $this->hasMany(DiscountCodeModel::class, 'supplier_id', 'id');
    }

    /**
     * Get the feed templates
     *
     * @return HasMany
     */
    public function feedTemplates(): HasMany
    {
        return $this->hasMany(FeedTemplateModel::class, 'supplier_id', 'id');
    }
}
