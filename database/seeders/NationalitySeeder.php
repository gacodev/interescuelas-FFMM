<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->insert([
            ['nationality' => 'colombiano', 'flag_image' => 'https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg'],
            ['nationality' => 'dominicano', 'flag_image' => 'https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg'],
            ['nationality' => 'extranjero', 'flag_image' => 'https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg'],
            ['nationality' => 'peruano', 'flag_image' => 'https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg'],

        ]);
    }
}
