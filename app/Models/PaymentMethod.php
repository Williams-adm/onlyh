<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PaymentMethod extends Model
{
    public function sales(): BelongsToMany
    {
        return $this->belongsToMany(Sale::class, 'payment_method_sale')
        ->withPivot('quantity')->withTimestamps();
    }
}
