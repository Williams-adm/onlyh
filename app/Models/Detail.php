<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Detail extends Model
{
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'detail_value')->withTimestamps();
    }
}