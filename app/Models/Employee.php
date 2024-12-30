<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Employee extends Model
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

    public function employeeDocuments(): HasMany
    {
        return $this->hasMany(EmployeeDocument::class)->chaperone();
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable')->chaperone();
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

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
