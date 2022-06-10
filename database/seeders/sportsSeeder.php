<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->insert([
            ['sport' => 'futbol','description' => 'depende de un balon','image' => 'localhost/deportes/futbol.png'],
            ['sport' => 'baloncesto','description' => 'depende de un balon','image' => 'localhost/deportes/baloncesto.png'],
            ['sport' => 'natancion','description' => 'depende de un balon','image' => 'localhost/deportes/natacion.png'],
            ['sport' => 'pentatlon militar','description' => 'depende de un balon','image' => 'localhost/deportes/pentatlon.png'],
            ['sport' => 'taekwondo','description' => 'depende de un balon','image' => 'localhost/deportes/taekwondo.png'],
            ['sport' => 'esgrima','description' => 'depende de un balon','image' => 'localhost/deportes/esgrima.png'],
            ['sport' => 'voleibol','description' => 'depende de un balon','image' => 'localhost/deportes/voleibol.png'],
            ['sport' => 'atletismo','description' => 'depende de un balon','image' => 'localhost/deportes/atletismo.png'],
            ['sport' => 'orientacion','description' => 'depende de un balon','image' => 'localhost/deportes/orientacion.png'],
            ['sport' => 'tiro deportivo','description' => 'depende de un balon','image' => 'localhost/deportes/tiro.png'],
            ['sport' => 'tennis de campo','description' => 'depende de un balon','image' => 'localhost/deportes/tennis.png'],
            
        ]);
    }
}
