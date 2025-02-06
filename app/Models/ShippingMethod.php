<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingMethod extends Model
{
    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class)->chaperone();
    }
}