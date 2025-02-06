<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PaymentMethod extends Model
{
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'payment_method_order')
        ->withPivot('status', 'amount')->withTimestamps();
    }
}