<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'name' => $this->name,
            'type' => $this->type,
            'dimension' => $this->dimension,
            'residents' => $this->characters->map(fn($char) => url("api/character/{$char->id}")),
            'url' => url("api/location/{$this->id}"),
            'created' => $this->created_at
        ];
    }
}
