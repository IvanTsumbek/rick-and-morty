<?php

namespace App\Http\Services;

use App\Models\Character;
use App\Http\Resources\CharacterResource;
use App\Http\Resources\CharactersResource;

class CharacterService
{
    public function getCharacters(array $filters)
    {
        $query = Character::with(['episodes', 'location', 'origin']);

        foreach ($filters as $key => $value) {
            $query->when($value, fn($q) => $q->where($key, 'like', "%$value%"));
        }

        return new CharactersResource($query->paginate(20));
    }

    public function getCharacter(int $id)
    {
        return new CharacterResource(Character::with(['episodes', 'location', 'origin'])->find($id));
    }
}
