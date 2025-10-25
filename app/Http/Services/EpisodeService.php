<?php

namespace App\Http\Services;

use App\Http\Resources\EpisodeResource;
use App\Http\Resources\EpisodesResource;
use App\Models\Episode;

class EpisodeService
{
    public function getEpisodes()
    {
        return new EpisodesResource(Episode::with('characters')->paginate(20));
    }
    
    public function getEpisode(int $id)
    {
        return new EpisodeResource(Episode::with('characters')->find($id));
    }
}