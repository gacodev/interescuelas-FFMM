<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class docsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_docs')->insert([
            ['doc_type'=>'Cedula de Ciudadania'],
            ['doc_type'=>'Tarjeta de identidad'],
            ['doc_type'=>'pasaporte'],
            ['doc_type'=>'Id'],

        ]);
    }
}
