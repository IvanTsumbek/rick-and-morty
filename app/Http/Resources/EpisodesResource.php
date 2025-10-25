<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'info' => [
                'count' => $this->total(),
                'pages' => $this->lastPage(),
                'next' => $this->nextPageUrl(),
                'prev' => $this->previousPageUrl(),
            ],
            'results' =>  $this->getCollection()->map(fn($episode) => [
                'id' => $episode->id,
                'name' => $episode->name,
                'air_date' => $episode->air_date,
                'episode' => $episode->episode,
                'characters' => $episode->characters->map(fn($char) => url("api/character/{$char->id}")),
                'url' => url("api/episode/{$episode->id}"),
                'created' => $episode->created_at,
            ])
        ];
    }
}
