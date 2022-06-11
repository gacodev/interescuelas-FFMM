<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class participantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participants')->insert([
            ['#identification'=> 123456789, 'name' =>'test', 'email' =>'g.sarer636tnoc12@gmail.com', 'phone' =>'1223456789', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>1, 'force_id'=>2, 'nationality_id' =>1],
            ['#identification'=> 12324567, 'name' =>'alumno1', 'email' =>'g.sarertnoc12@gmail.com', 'phone' =>'123456789', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>1, 'force_id'=>2, 'nationality_id' =>1],
            ['#identification'=> 12234567, 'name' =>'alumno2', 'email' =>'g.saccrertnoc12@gmail.com', 'phone' =>'1456789', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>2, 'force_id'=>3, 'nationality_id' =>1],
            ['#identification'=> 122234567, 'name' =>'alumno3', 'email' =>'g.sarercctnoc12@gmail.com', 'phone' =>'156789', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>1, 'force_id'=>1, 'nationality_id' =>1],

        ]);
    }
}
