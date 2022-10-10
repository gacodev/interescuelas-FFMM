<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplineParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discipline_participants')->insert([
            ['award_id' => 1, 'participant_id' => 1, 'team_id' => 1, 'discipline_id' => 3],
            ['award_id' => 2, 'participant_id' => 2, 'team_id' => 2, 'discipline_id' => 2],
            ['award_id' => 3, 'participant_id' => 3, 'team_id' => 1, 'discipline_id' => 3],
            ['award_id' => 1, 'participant_id' => 4, 'team_id' => 2, 'discipline_id' => 3],
            ['award_id' => 2, 'participant_id' => 5, 'team_id' => 2, 'discipline_id' => 3],
            ['award_id' => 3, 'participant_id' => 6, 'team_id' => 2, 'discipline_id' => 3],
            ['award_id' => 3, 'participant_id' => 6, 'team_id' => 2, 'discipline_id' => 2],
            ['award_id' => 3, 'participant_id' => 1, 'team_id' => 2, 'discipline_id' => 2],        ]);
    }
}
