<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Location;

class LocationIndexController extends Controller
{
    public function indexAll()
    {
        // Берём все локации с персонажами
        $locations = Location::with('characters')->get();
    
        $results = [];
        foreach ($locations as $location) {
            $residents = [];
            foreach ($location->characters as $char) {
                // Формируем URL каждого персонажа
                $residents[] = url('api/character/' . $char->id);
            }
    
            $results[] = [
                'id' => $location->id,
                'name' => $location->name,
                'type' => $location->type,
                'dimension' => $location->dimension,
                'residents' => $residents,
                'url' => url('api/location/' . $location->id),
                'created' => $location->created_at->toIso8601String(),
            ];
        }
    
        $response = [
            'info' => [
                'count' => $locations->count(),
                'pages' => ceil($locations->count() / 20), // пример, можно настроить по реальной пагинации
                'next' => 'https://rickandmortyapi.com/api/location?page=2',
                'prev' => null,
            ],
            'results' => $results,
        ];
    
        return response()->json($response, 200);
    }

    public function index($id)
    {
        $location = Location::with('characters')->find($id);
        $residents = $location->characters->map(function ($char) {
            return url('api/character/' . $char->id);
        })->toArray();
        $response = [
            'id' => $location->id,
            'name' => $location->name,
            'type' => $location->type,
            'dimension' => $location->dimension,
            'residents' => $residents,
            'url' => env('APP_URL') . 'api/' . $location->id,
            'created' => $location->created_at,
        ];

        return response()->json($response, 200);
    }
}
