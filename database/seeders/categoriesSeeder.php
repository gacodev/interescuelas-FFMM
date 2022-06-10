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
            ['categorie'=>'100 metros', 'gender_id'=> 1],
            ['categorie'=>'200 metros', 'gender_id'=> 1],
            ['categorie'=>'300 metros', 'gender_id'=> 1],
            ['categorie'=>'400 metros', 'gender_id'=> 1],

        ]);
    }
}
