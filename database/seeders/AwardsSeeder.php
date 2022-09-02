<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AwardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('awards')->insert([
            ['award' => 'oro','description' => 'para el primer puesto','image' => 'localhost/awards/gold.png'],
            ['award' => 'plata','description' => 'para el segundo puesto','image' => 'localhost/awards/silver.png'],
            ['award' => 'bronce','description' => 'para el tercer puesto','image' => 'localhost/awards/bronze.png'],
         
        ]);
    }
}
