<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->insert([
            ['competence_id' => 1, 'participant_id' => 1, 'award_id' => 1],
            ['competence_id' => 1, 'participant_id' => 2, 'award_id' => 2],
            ['competence_id' => 1, 'participant_id' => 3, 'award_id' => 3],
            ['competence_id' => 2, 'participant_id' => 4, 'award_id' => 1],
            ['competence_id' => 2, 'participant_id' => 5, 'award_id' => 2],
            ['competence_id' => 2, 'participant_id' => 6, 'award_id' => 3],
            ['competence_id' => 3, 'participant_id' => 7, 'award_id' => 1],
            ['competence_id' => 3, 'participant_id' => 8, 'award_id' => 2],
            ['competence_id' => 3, 'participant_id' => 9, 'award_id' => 3],
            ['competence_id' => 4, 'participant_id' => 10, 'award_id' => 1],
        ]);

    }
}
