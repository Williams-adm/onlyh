<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaction extends Model
{
    public function inventories(): BelongsToMany
    {
        return $this->belongsToMany(Inventory::class, 'detail_transaction')
        ->withPivot('quantity', 'purcharse_price', 'profit')->withTimestamps();
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}