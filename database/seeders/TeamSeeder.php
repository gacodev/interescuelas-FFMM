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
            ['name'=>'emavi','sport_id' => 1,'force_id' => 1],
            ['name'=>'esmic','sport_id' => 1,'force_id' => 2],
            ['name'=>'ponal','sport_id' => 1,'force_id' => 3],
            ['name'=>'esnav','sport_id' => 1,'force_id' => 4],
            ['name'=>'emavi','sport_id' => 2,'force_id' => 1],
            ['name'=>'esmic','sport_id' => 2,'force_id' => 2],
            ['name'=>'ponal','sport_id' => 2,'force_id' => 3],
            ['name'=>'esnav','sport_id' => 2,'force_id' => 4],
        ]);
    }
}
