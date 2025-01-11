<?php

namespace App\Http\Resources\Api\Category;

use App\Traits\Api\HasCommonAttributesJson;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    use HasCommonAttributesJson;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->transform(function ($category) {
            return $this->getCategoryAttributes($category);
        })->all();
    }
}