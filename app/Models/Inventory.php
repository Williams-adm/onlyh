<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Inventory extends Model
{
    protected $table = 'inventory';
    
    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class, 'discount_inventory')->withTimestamps();
    }

    public function transactions(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'detail_transaction')
        ->withPivot('quantity', 'purcharse_price', 'profit')->withTimestamps();
    }

    public function sales(): BelongsToMany
    {
        return $this->belongsToMany(Sale::class, 'detail_sale')
        ->withPivot('quantity', 'unit_price', 'discount', 'amount')->withTimestamps();
    }
}
