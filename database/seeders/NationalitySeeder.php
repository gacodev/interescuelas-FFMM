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
            ['nationality' => 'colombiano','flag_image' => 'https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg'],
            ['nationality' => 'dominicano','flag_image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_the_Dominican_Republic.svg/2560px-Flag_of_the_Dominican_Republic.svg.png'],
            ['nationality' => 'estadounidense','flag_image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/1200px-Flag_of_the_United_States.svg.png'],
            ['nationality' => 'peruano','flag_image' => 'https://image.made-in-china.com/2f0j00pBWtgrmGJloi/Peru-W-Logo-Flag.jpg'],

        ]);
    }
}
