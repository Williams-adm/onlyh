<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CashCount extends Model
{
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
    
    public function cashTransactions(): HasMany
    {
        return $this->hasMany(CashTransaction::class)->chaperone();
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class)->chaperone();
    }
}
