<?php

namespace App\Http\Controllers\Episode;

use App\Http\Controllers\Controller;
use App\Http\Services\EpisodeService;

class EpisodeController extends Controller
{
    public function __construct(readonly EpisodeService $service){}

    public function index()
    {
        return response()->json($this->service->getEpisodes());
    }

    public function show($id)
    {
        return response()->json($this->service->getEpisode($id));
    }
}
