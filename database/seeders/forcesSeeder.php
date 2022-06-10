<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class forcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forces')->insert([
            ['force' => 'Ejercito Nacional','slogan'=>'patria honor lealtad','image' => 'localhost/forces/ejc.png'],
            ['force' => 'Fuerza Aerea Colombiana','slogan'=>'ad astra','image' => 'localhost/forces/fac.png'],
            ['force' => 'Armada Nacional','slogan'=>'protegemos el azul de la bandera','image' => 'localhost/forces/arc.png'],
            ['force' => 'Policia Nacional','slogan'=>'servir y proteger','image' => 'localhost/forces/pol.png'],

        ]);
    }
}
