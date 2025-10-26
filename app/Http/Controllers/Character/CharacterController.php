<?php

namespace App\Http\Controllers\Character;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\CharacterService;

class CharacterController extends Controller
{
    public function __construct(readonly CharacterService $service){}

    public function index(Request $request)
    {
        $filters = $request->only(['name', 'status', 'species', 'gender']);
        return response()->json($this->service->getCharacters($filters));
    }

    public function show($id)
    {
        
        return response()->json($this->service->getCharacter($id));
    }
}
