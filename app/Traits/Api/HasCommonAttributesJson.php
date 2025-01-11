<?php

namespace App\Traits\Api;

trait HasCommonAttributesJson
{
    /**
     * Obtener los atributos comunes para 'Category' en los resources
     *
     * @return array
     */
    protected function getCategoryAttributes($category = null): array
    {
        $category = $category ?? $this;
        return [
            'id' => $category->id,
            'name' => $category->name,
            'description' => $category->description,
            'status' => $category->status,
        ];
    }
}