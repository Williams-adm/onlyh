<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Customer extends Model
{
    use HasFactory;

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable')->chaperone();
    }
    
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class)->chaperone();
    }

    public function documentTypes(): MorphOne
    {
        return $this->morphOne(DocumentType::class, 'documentable');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class)->chaperone();
    }

    public function phones(): MorphMany
    {
        return $this->morphMany(Phone::class, 'phoneable')->chaperone();
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }
}