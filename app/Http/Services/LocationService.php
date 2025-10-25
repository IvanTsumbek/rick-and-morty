<?php

namespace App\Http\Services;

use App\Http\Resources\LocationResource;
use App\Http\Resources\LocationsResource;
use App\Models\Location;

class LocationService
{
    public function getLocations()
    {
        return new LocationsResource(Location::with('characters')->paginate(20));
    }
    
    public function getLocation(int $id)
    {
        return new LocationResource(Location::with('characters')->find($id));
    }
}