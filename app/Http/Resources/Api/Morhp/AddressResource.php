<?php

namespace App\Http\Resources\Api\Morhp;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'country' => $this->country,
            'region' => $this->region,
            'province' => $this->province,
            'city' => $this->city,
            'street' => $this->street . ' ' . '#' . $this->number,
        ];
    }
}