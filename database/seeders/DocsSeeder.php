<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_docs')->insert([
            ['doc_type'=>'cedula de ciudadania'],
            ['doc_type'=>'tarjeta de identidad'],
            ['doc_type'=>'pasaporte'],
            ['doc_type'=>'cedula de extranjería'],
        ]);
    }
}
