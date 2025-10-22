<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function characters()
    {
        return $this->belongsToMany(Character::class);
    } 
}
