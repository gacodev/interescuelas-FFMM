<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competences')->insert([
            ['sport_id' =>1,'categorie_id' =>1,'quantity_of_participants' =>10],
            ['sport_id' =>1,'categorie_id' =>2,'quantity_of_participants' =>10],
            ['sport_id' =>1,'categorie_id' =>3,'quantity_of_participants' =>10],
            ['sport_id' =>1,'categorie_id' =>4,'quantity_of_participants' =>10],
            ['sport_id' =>2,'categorie_id' =>5,'quantity_of_participants' =>10],
            ['sport_id' =>2,'categorie_id' =>6,'quantity_of_participants' =>10],
            ['sport_id' =>2,'categorie_id' =>7,'quantity_of_participants' =>10],
            ['sport_id' =>2,'categorie_id' =>8,'quantity_of_participants' =>10],
        ]);
    }
}
