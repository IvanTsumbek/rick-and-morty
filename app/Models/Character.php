<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    } 

}
