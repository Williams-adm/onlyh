<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function cashCount(): BelongsTo
    {
        return $this->belongsTo(CashCount::class);
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function employee():BelongsTo
    {
        return $this->belongsTo(employee::class);
    }

    public function inventories(): BelongsToMany
    {
        return $this->belongsToMany(Inventory::class, 'detail_sale')
        ->withPivot('quantity', 'unit_price', 'discount', 'amount')->withTimestamps();
    }

    public function paymentMethods(): BelongsToMany
    {
        return $this->belongsToMany(PaymentMethod::class, 'payment_method_sale')
        ->withPivot('quantity')->withTimestamps();
    }
}
