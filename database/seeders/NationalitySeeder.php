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
            ['nationality' => 'colombiano','flag_image' => 'localhost/banderas/colombia.png'],
            ['nationality' => 'panameño','flag_image' => 'localhost/banderas/panama.png'],
            ['nationality' => 'estadounidense','flag_image' => 'localhost/banderas/usa.png'],
            ['nationality' => 'peruano','flag_image' => 'localhost/banderas/peru.png'],

        ]);
    }
}
