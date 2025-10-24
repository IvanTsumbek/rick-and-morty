<?php

namespace App\Http\Services;

use App\Http\Resources\LocationResource;
use App\Models\Location;

class LocationService
{
    public function getLocations():array
    {
        $locations = Location::with('characters')->paginate(20);

        $results = $locations->getCollection()->map(fn($loc) => [
            'id' => $loc->id,
            'name' => $loc->name,
            'type' => $loc->type,
            'dimension' => $loc->dimension,
            'residents' => $loc->characters->map(fn($c) => url("api/character/{$c->id}")),
            'url' => url("api/location/{$loc->id}"),
            'created' => $loc->created_at,
        ]);

        $data = [
            'info' => [
                'count' => $locations->total(),
                'pages' => $locations->lastPage(),
                'next' => $locations->nextPageUrl(),
                'prev' => $locations->previousPageUrl(),
            ],
            'results' => $results,
        ];

        return $data;
    }
    
    public function getLocation(int $id)
    {
        $location = Location::with('characters')->find($id);

        return new LocationResource($location);
    }
}