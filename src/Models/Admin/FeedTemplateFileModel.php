<?php

namespace Clickbear\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeedTemplateFileModel
 *
 * @property int $feed_template_id
 * @property string $file_path
 * @property int $active (options: [0, 1])
 *
 * @package App\Models\Admin
 */
class FeedTemplateFileModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feed_template_files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'feed_template_id',
        'file_path',
        'active',
        'status',
    ];

    /**
     * The related feed template
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feedtemplate() {
        return $this->belongsTo(FeedTemplateModel::class, 'feed_template_id', 'id');
    }
}
