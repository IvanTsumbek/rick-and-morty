<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
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
            'air_date' => $this->air_date,
            'episode' => $this->episode,
            'characters' => $this->characters->map(fn($char) => url("api/character/{$char->id}")),
            'url' => url("api/episode/{$this->id}"),
            'created' => $this->created_at,
        ];
    }
}
