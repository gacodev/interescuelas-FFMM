<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplines')->insert([
            ['discipline' => '100 metros', 'description' => 'soy 100', 'discipline_image' => 'localhost/sports/disciplines/100.png', 'sport_id' => 8, 'gender_id' => 1],
            ['discipline' => '200 metros', 'description' => 'soy 100', 'discipline_image' => 'localhost/sports/disciplines/200.png', 'sport_id' => 8, 'gender_id' => 1],
            ['discipline' => '300 metros', 'description' => 'soy 100', 'discipline_image' => 'localhost/sports/disciplines/300.png', 'sport_id' => 8, 'gender_id' => 1],
            ['discipline' => '400 metros', 'description' => 'soy 100', 'discipline_image' => 'localhost/sports/disciplines/400.png', 'sport_id' => 8, 'gender_id' => 1],
            ['discipline' => '100 metros con obstaculos', 'description' => 'soy 100', 'discipline_image' => 'localhost/sports/disciplines/100_obstaculos.png', 'sport_id' => 8, 'gender_id' => 2],
            ['discipline' => '200 metros con obstaculos', 'description' => 'soy 100', 'discipline_image' => 'localhost/sports/disciplines/200_obstaculos.png', 'sport_id' => 8, 'gender_id' => 2],
            ['discipline' => '300 metros con obstaculos', 'description' => 'soy 100', 'discipline_image' => 'localhost/sports/disciplines/300_obstaculos.png', 'sport_id' => 8, 'gender_id' => 2],
            ['discipline' => '400 metros con obstaculos', 'description' => 'soy 100', 'discipline_image' => 'localhost/sports/disciplines/400_obstaculos.png', 'sport_id' => 8, 'gender_id' => 2],
        ]);
    }
}
