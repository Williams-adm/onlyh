<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Customer extends Model
{
    use HasFactory;

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable')->chaperone();
    }

    public function documentTypes(): MorphMany
    {
        return $this->morphMany(DocumentType::class, 'documentable')->chaperone();
    }

    public function notes(): MorphMany
    {
        return $this->morphMany(Note::class, 'noteable')->chaperone();
    }

    public function phones(): MorphMany
    {
        return $this->morphMany(Phone::class, 'phoneable')->chaperone();
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class)->chaperone();
    }
}
