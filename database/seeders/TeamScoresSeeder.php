<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamScoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams_scores')->insert([
            ['team_id' => 1,'award_id' => 1],
            ['team_id' => 1,'award_id' => 2],
            ['team_id' => 1,'award_id' => 3],
            ['team_id' => 1,'award_id' => 3],
            ['team_id' => 2,'award_id' => 1],
            ['team_id' => 2,'award_id' => 2],
            ['team_id' => 2,'award_id' => 3],
            ['team_id' => 2,'award_id' => 3],
        ]);
    }
}
