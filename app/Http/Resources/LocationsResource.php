<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationsResource extends JsonResource
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
            'results' => $this->getCollection()->map(fn($loc) => [
                'id' => $loc->id,
                'name' => $loc->name,
                'type' => $loc->type,
                'dimension' => $loc->dimension,
                'residents' => $loc->characters->map(fn($c) => url("api/character/{$c->id}")),
                'url' => url("api/location/{$loc->id}"),
                'created' => $loc->created_at,
            ])
        ];
    }
}
