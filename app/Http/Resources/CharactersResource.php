<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharactersResource extends JsonResource
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
            'results' => $this->getCollection()->map(fn($character) => [
                'id' => $character->id,
                'name' => $character->name,
                'status' => $character->status,
                'species' => $character->species,
                'type' => $character->type,
                'gender' => $character->gender,
                'origin' => [
                    'name' => $character->origin?->name,
                    'url' => $character->origin ? url("api/location/{$character->origin->id}") : null
                ],
                'location' => [
                    'name' => $character->location?->name,
                    'url' =>  $character->location ? url("api/location/{$character->location->id}") : null
                ],
                'image' => $character->image,
                'episode' => $character->episodes->map(fn($epis) => url("api/episode/{$epis->id}")),
                'url' => url("api/character/{$character->id}"),
                'created' => $character->created_at,
            ]),
        ];
    }
}
