<?php

namespace Clickbear\Models\Catalog\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the child menu items
     *
     * @return HasMany
     */
    public function menuitem(): HasMany
    {
        return $this->hasMany(MenuItemModel::class, 'menu_id', 'id');
    }
}