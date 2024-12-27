<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Branch extends Model
{
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function cashCounts(): HasMany
    {
        return $this->hasMany(CashCount::class)->chaperone();
    }

    public function phones(): MorphMany
    {
        return $this->morphMany(Phone::class, 'phoneable')->chaperone();
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'inventory')
        ->withPivot('stock_min', 'stock_max', 'current_stock', 'selling_price', 'status')->withTimestamps();
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class)->chaperone();
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class)->chaperone();
    }
}