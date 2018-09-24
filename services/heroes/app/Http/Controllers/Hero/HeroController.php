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
        $cached = Hero::getCached($id);
        if ($cached !== null) {
            return $this->ok($cached);
        }
        $hero = Hero::find($id);
        if ($hero == null) {
            return $this->resourceNotFound();
        }
        Hero::saveCache($id, $hero);
        return $this->ok($hero);
    }

    public function insert (Request $request) {
        $toInsert = $request->all();
        $hero = Hero::create($toInsert);
        
        Hero::saveCache($hero->id, $hero);

        return $this->created($hero, 201);
    }

    public function update (Request $request, $id) {
        $dataToUpdate = $request->all();
        
        $hero = Hero::findOrFail($id);
        
        $hero->update($dataToUpdate);

        Hero::saveCache($hero->id, $hero);

        return $this->ok($hero);
    }

    public function delete (Request $request, $id) {
        $hero = Hero::findOrFail($id);
        if ($hero == null) {
            return resourceNotFound();
        }
        $hero->delete();
        Hero::deleteCached($id);
        return $this->noContent();
    }
}
