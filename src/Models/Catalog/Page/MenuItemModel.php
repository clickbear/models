<?php

namespace Clickbear\Models\Catalog\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MenuItemModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
        'parent_id',
        'order',
        'route',
        'parameters',
    ];

    /**
     * Get the parent item
     *
     * @return HasOne
     */
    public function parent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    /**
     * Get the related menu
     *
     * @return HasOne
     */
    public function menu(): HasOne
    {
        return $this->hasOne(MenuModel::class, 'menu_id', 'id');
    }
}