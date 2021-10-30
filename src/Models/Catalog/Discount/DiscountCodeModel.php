<?php

namespace Clickbear\Models\Catalog\Discount;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCodeModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'discount_code';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discount_amount',
        'discount_identifier_before',
        'discount_identifier_after',
        'description',
        'code',
        'started_at',
        'ended_at',
    ];

    protected $guarded = [
        'supplier_id'
    ];

    /**
     * Get the supplier of the discount code
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier() {
        return $this->belongsTo(SupplierModel::class, 'id', 'supplier_id');
    }

    /**
     * Get the mapping of identifier to prefix
     *
     * @return string
     */
    public static function identifierToPrefix()
    {
        return [
            'EURO' => ' euro',
            'PERC' => '%'
        ];
    }

}
