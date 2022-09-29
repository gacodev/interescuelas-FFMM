<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forces')->insert([
            ['force' => "EJC", 'description' => 'Ejercito Nacional','slogan'=>'patria honor lealtad','force_image' => 'https://iconape.com/wp-content/files/ju/265663/svg/265663.svg','color'=>' #ca1c2b'],
            ['force' => "FAC", 'description' => 'Fuerza Aerea Colombiana','slogan'=>'ad astra','force_image' => 'https://upload.wikimedia.org/wikipedia/commons/a/a0/Escudo_Fuerza_Aerea_Colombiana.svg','color'=>' #0a0332'],
            ['force' => "ARC", 'description' => 'Armada Nacional','slogan'=>'protegemos el azul de la bandera','force_image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Escudo_Armada_Nacional_de_Colombia.svg/1200px-Escudo_Armada_Nacional_de_Colombia.svg.png','color'=>' #071495'],
            ['force' => "PONAL", 'description' => 'Policia Nacional','slogan'=>'servir y proteger','force_image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Coat_of_arms_of_colombian_national_police.svg/1024px-Coat_of_arms_of_colombian_national_police.svg.png','color'=>' #0c8138'],

        ]);
    }
}
