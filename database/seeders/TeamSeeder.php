<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            ['discipline_id' => 1,'force_id' => 1],
            ['discipline_id' => 1,'force_id' => 2],
            ['discipline_id' => 1,'force_id' => 3],
            /*['discipline_id' => 1,'force_id' => 4],
            ['discipline_id' => 2,'force_id' => 1],
            ['discipline_id' => 2,'force_id' => 2],
            ['discipline_id' => 2,'force_id' => 3],
            ['discipline_id' => 2,'force_id' => 4],*/
        ]);
    }
}
