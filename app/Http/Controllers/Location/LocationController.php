<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Http\Services\LocationService;

class LocationController extends Controller
{
    public function __construct(readonly LocationService $service){}

    public function index()
    {
        return response()->json($this->service->getLocations());
    }

    public function show($id)
    {
        return response()->json($this->service->getLocation($id));
    }
}
