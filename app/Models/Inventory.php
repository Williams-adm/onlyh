<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Inventory extends Model
{
    use HasFactory;
    
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'detail_cart')
        ->withPivot('quantity', 'unit_price', 'discount')->withTimestamps();
    }

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class, 'discount_inventory')->withTimestamps();
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'detail_order')
        ->withPivot('quantity', 'unit_price', 'discount')->withTimestamps();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function transactions(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'detail_transaction')
        ->withPivot('quantity', 'purcharse_price', 'profit')->withTimestamps();
    }
}