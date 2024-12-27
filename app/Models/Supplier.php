<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Supplier extends Model
{
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable')->chaperone();
    }

    public function documentTypes(): MorphMany
    {
        return $this->morphMany(DocumentType::class, 'documentable')->chaperone();
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
