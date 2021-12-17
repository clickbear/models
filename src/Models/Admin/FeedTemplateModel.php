<?php

namespace Clickbear\Models\Admin;

use App\Models\FeedMapProductModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class FeedTemplateModel
 *
 * @property string $name
 * @property string $type
 * @property int $supplier_id
 *
 * @package App\Models\Admin
 */
class FeedTemplateModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feed_templates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'supplier_id'
    ];

    /**
     * Get all files related to the feed template
     *
     * @return HasMany
     */
    public function files(): HasMany
    {
        return $this->hasMany(FeedTemplateFileModel::class, 'feed_template_id', 'id');
    }

    /**
     * Get all product feed maps
     *
     * @return HasMany
     */
    public function feedMapProduct(): HasMany
    {
        return $this->hasMany(FeedMapProductModel::class, 'feed_template_id', 'id');
    }

    /**
     * Attached supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(SupplierModel::class, 'id', 'supplier_id');
    }
}
