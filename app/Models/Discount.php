<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Discount extends Model
{
    public function inventories(): BelongsToMany
    {
        return $this->belongsToMany(Inventory::class, 'discount_inventory')->withTimestamps();
    }
}