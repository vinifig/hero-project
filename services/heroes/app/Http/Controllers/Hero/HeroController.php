<?php

namespace App\Http\Controllers\Hero;

use App\Http\Controllers\Controller;
use \Symfony\Component\HttpFoundation\Request;
use App\Modules\Hero\Hero;

class HeroController extends Controller
{
    public function getAll (Request $request, $id) {
        return Hero::findOrFail($id);
    }

    public function insert (Request $request) {
        $toInsert = $request->all();
        $user = Hero::create($toInsert);
        return response()
            ->json($user, 201);
    }
}
