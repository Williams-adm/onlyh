<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CashTransaction extends Model
{
    public function cashCount(): BelongsTo
    {
        return $this->belongsTo(CashCount::class);
    }
}
