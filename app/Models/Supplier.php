<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Supplier extends Model
{
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable')->chaperone();
    }

    public function documentTypes(): MorphOne
    {
        return $this->morphOne(DocumentType::class, 'documentable');
    }

    public function phones(): MorphMany
    {
        return $this->morphMany(Phone::class, 'phoneable')->chaperone();
    }
    
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class)->chaperone();
    }
}