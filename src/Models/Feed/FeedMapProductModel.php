<?php

namespace Clickbear\Models;

use App\Models\Admin\FeedTemplateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedMapProductModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feed_map_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'feed_template_id',
        'key',
        'value',
    ];

    /**
     * Get the related feed template
     *
     * @return BelongsTo
     */
    public function feedTemplate(): BelongsTo
    {
        return $this->belongsTo(FeedTemplateModel::class, 'id', 'feed_template_id');
    }

}
