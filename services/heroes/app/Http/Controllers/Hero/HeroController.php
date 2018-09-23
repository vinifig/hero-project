<?php

namespace App\Http\Controllers\Hero;

use App\Http\Controllers\Controller;
use \Symfony\Component\HttpFoundation\Request;
use App\Modules\Hero\Hero;

class HeroController extends Controller
{

    public function getAll (Request $request) {
        $heroes = Hero::all();
        if ($heroes->count() == 0) {
            return $this->resourceNotFound();
        }
        return $this->ok($heroes);
    }

    public function get (Request $request, $id) {
        $hero = Hero::findOrFail($id);
        return $this->ok($hero);
    }

    public function insert (Request $request) {
        $toInsert = $request->all();
        $hero = Hero::create($toInsert);
        return $this->created($hero, 201);
    }

    public function update (Request $request, $id) {
        $dataToUpdate = $request->all();
        
        $hero = Hero::findOrFail($id);
        
        $hero->update($dataToUpdate);

        return $this->ok($hero);
    }

    public function delete (Request $request, $id) {
        Hero::findOrFail($id)
            ->delete();
        return $this->noContent();
    }
}
