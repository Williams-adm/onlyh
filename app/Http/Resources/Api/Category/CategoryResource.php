<?php

namespace App\Http\Resources\Api\Category;

use App\Traits\Api\HasCommonAttributesJson;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    use HasCommonAttributesJson;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $attributes = $this->getCategoryAttributes();
        return $attributes;
    }
}