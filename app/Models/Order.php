<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Order extends Model
{
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable')->chaperone();
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function inventories(): BelongsToMany
    {
        return $this->belongsToMany(Inventory::class)
        ->withPivot('quantity', 'purcharse_price', 'profit')->withTimestamps();
    }

    public function paymentMethods(): BelongsToMany
    {
        return $this->belongsToMany(PaymentMethod::class, 'payment_method_order')
        ->withPivot('status', 'amount')->withTimestamps();
    }

    public function shipment(): HasOne
    {
        return $this->hasOne(Shipment::class);
    }
}