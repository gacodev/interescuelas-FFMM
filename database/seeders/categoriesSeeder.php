<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['categorie'=>'100 metros', 'description' =>'soy 100', 'image'=>'localhost/sports/categories/100.png','gender_id'=> 1],
            ['categorie'=>'200 metros', 'description' =>'soy 100', 'image'=>'localhost/sports/categories/200.png','gender_id'=> 1],
            ['categorie'=>'300 metros', 'description' =>'soy 100', 'image'=>'localhost/sports/categories/300.png','gender_id'=> 1],
            ['categorie'=>'400 metros', 'description' =>'soy 100', 'image'=>'localhost/sports/categories/400.png','gender_id'=> 1],
            ['categorie'=>'100 metros con obstaculos', 'description' =>'soy 100', 'image'=>'localhost/sports/categories/100_obstaculos.png','gender_id'=> 2],
            ['categorie'=>'200 metros con obstaculos', 'description' =>'soy 100', 'image'=>'localhost/sports/categories/200_obstaculos.png','gender_id'=> 2],
            ['categorie'=>'300 metros con obstaculos', 'description' =>'soy 100', 'image'=>'localhost/sports/categories/300_obstaculos.png','gender_id'=> 2],
            ['categorie'=>'400 metros con obstaculos', 'description' =>'soy 100', 'image'=>'localhost/sports/categories/400_obstaculos.png','gender_id'=> 2],
        ]);
    }
}
