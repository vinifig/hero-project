<?php

use Illuminate\Database\Seeder;
use App\Modules\Hero\Hero;
class HeroesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $heroes = [
            ['name' => 'Steven', 'role' => 'Mago', 'type' => 'Magia Branca', 'life' => 2900, 'defense' => 200, 'attack'=> 340, 'attackSpeed'=> 1.3, 'moveSpeed'=> 320],
            ['name' => 'Mona', 'role' => 'Sacerdote', 'type' => 'Cura, Magia Branca', 'life' => 3100, 'defense' => 200, 'attack'=> 180, 'attackSpeed'=> 1.3, 'moveSpeed'=> 330],
            ['name' => 'Morgan', 'role' => 'Lutador', 'type' => 'Tanker', 'life' => 6000, 'defense' => 360, 'attack'=> 130, 'attackSpeed'=> 1.1, 'moveSpeed'=> 300]
        ];
        foreach($heroes as $hero) {
            Hero::create($hero);
        }
    }
}
