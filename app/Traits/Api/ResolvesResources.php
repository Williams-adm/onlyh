<?php

namespace App\Traits\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait ResolvesResources
{
    /**
     * Retorna la ResourceCollection específica según el modelo.
     */
    protected function resourceCollection($data): ResourceCollection
    {
        $collectionClass = $this->resolveCollectionClass();
        return new $collectionClass($data);
    }

    /**
     * Retorna el Resource específico según el modelo.
     */
    protected function resource($data): JsonResource
    {
        $resourceClass = $this->resolveResourceClass();
        return new $resourceClass($data);
    }

    /**
     * Resuelve dinámicamente el nombre de la ResourceCollection.
     */
    protected function resolveCollectionClass(): string
    {
        $modelName = class_basename($this->model);
        return "App\\Http\\Resources\\Api\\{$modelName}\\{$modelName}Collection";
    }

    /**
     * Resuelve dinámicamente el nombre de la Resource.
     */
    protected function resolveResourceClass(): string
    {
        $modelName = class_basename($this->model);
        return "App\\Http\\Resources\\Api\\{$modelName}\\{$modelName}Resource";
    }
}