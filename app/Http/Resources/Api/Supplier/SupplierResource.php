<?php

namespace App\Http\Resources\Api\Supplier;

use App\Http\Resources\Api\Morhp\AddressResource;
use App\Http\Resources\Api\Morhp\DocumentTypeResource;
use App\Http\Resources\Api\Morhp\PhoneResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'document_types' => DocumentTypeResource::collection($this->whenLoaded('documentTypes')),
            'type' => $this->type,
            'business_name' => $this->business_name,
            'address' => AddressResource::collection($this->whenLoaded('addresses')),
            'phones' => PhoneResource::collection($this->whenLoaded('phones')),
            'contac' => $this->contac,
            'status' => $this->status,
        ];
    }
}