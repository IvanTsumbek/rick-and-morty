<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
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
            'status' => $this->status,
            'species' => $this->species,
            'type' => $this->type,
            'gender' => $this->gender,
            'origin' => [
                'name' => $this->origin?->name,
                'url' => $this->origin ? url("api/location/{$this->origin->id}") : null
            ],
            'location' => [
                'name' => $this->location?->name,
                'url' => $this->location ? url("api/location/{$this->location->id}") : null
            ],
            'image' => $this->image,            
            'episode' => $this->episodes->map(fn($epis) => url("api/episode/{$epis->id}")),
            'url' => url("api/character/{$this->id}"),
            'created' => $this->created_at,
        ];
    }
}
