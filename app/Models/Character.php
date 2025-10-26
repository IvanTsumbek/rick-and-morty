<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    public function origin()
    {
        return $this->belongsTo(Location::class, 'origin_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
