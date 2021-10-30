<?php

namespace Clickbear\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discountCodes() {
        return $this->hasMany(DiscountCodeModel::class, 'supplier_id', 'id');
    }
}
