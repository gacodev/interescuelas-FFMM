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
            ['#identification'=> 123456789, 'name' =>'test', 'email' =>'g.sarer636tnoc12@gmail.com', 'phone' =>'1223456789', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>1, 'force_id'=>2, 'nationality_id' =>1,'sport_id'=>1,'photo'=>'https://img.freepik.com/foto-gratis/retrato-joven-sonriente-gafas_171337-4842.jpg?w=2000'],
            ['#identification'=> 12324567, 'name' =>'alumno1', 'email' =>'g.sarertnoc12@gmail.com', 'phone' =>'123456789', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>1, 'force_id'=>2, 'nationality_id' =>2,'sport_id'=>1,'photo'=>'https://img.freepik.com/foto-gratis/retrato-joven-sonriente-gafas_171337-4842.jpg'],
            ['#identification'=> 12234567, 'name' =>'alumno2', 'email' =>'g.saccrertnoc12@gmail.com', 'phone' =>'1456789', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>2, 'force_id'=>3, 'nationality_id' =>1,'sport_id'=>1,'photo'=>'https://img.freepik.com/foto-gratis/retrato-joven-sonriente-gafas_171337-4842.jpg'],
            ['#identification'=> 1226667, 'name' =>'alumno3', 'email' =>'g.sarercttctnoc12@gmail.com', 'phone' =>'156789', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>1, 'force_id'=>1, 'nationality_id' =>2,'sport_id'=>1,'photo'=>'https://img.freepik.com/foto-gratis/retrato-joven-sonriente-gafas_171337-4842.jpg'],
            ['#identification'=> 1227, 'name' =>'alumno4', 'email' =>'g.sarerttcctnoc12@gmail.com', 'phone' =>'15674389', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>2, 'force_id'=>4, 'nationality_id' =>3,'sport_id'=>1,'photo'=>'https://img.freepik.com/foto-gratis/retrato-joven-sonriente-gafas_171337-4842.jpg'],
            ['#identification'=> 127, 'name' =>'alumno5', 'email' =>'g.saregtrcctnoc12@gmail.com', 'phone' =>'15676589', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>1, 'force_id'=>1, 'nationality_id' =>2,'sport_id'=>1,'photo'=>'https://img.freepik.com/foto-gratis/retrato-joven-sonriente-gafas_171337-4842.jpg'],
            ['#identification'=> 17, 'name' =>'alumno6', 'email' =>'g.sarercctnoc12tt@gmail.com', 'phone' =>'15672289', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>2, 'force_id'=>4, 'nationality_id' =>1,'sport_id'=>1,'photo'=>'https://img.freepik.com/foto-gratis/retrato-joven-sonriente-gafas_171337-4842.jpg'],
            ['#identification'=> 167, 'name' =>'alumno7', 'email' =>'g.sarercctnoc1ttt2@gmail.com', 'phone' =>'15632789', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>2, 'force_id'=>1, 'nationality_id' =>3,'sport_id'=>1,'photo'=>'https://img.freepik.com/foto-gratis/retrato-joven-sonriente-gafas_171337-4842.jpg'],
            ['#identification'=> 14567, 'name' =>'alumno8', 'email' =>'g.sarercctnoctttt12@gmail.com', 'phone' =>'154326789', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>1, 'force_id'=>3, 'nationality_id' =>1,'sport_id'=>1,'photo'=>'https://img.freepik.com/foto-gratis/retrato-joven-sonriente-gafas_171337-4842.jpg'],
            ['#identification'=> 1467, 'name' =>'alumno9', 'email' =>'g.sarercctnoc1ttttt2@gmail.com', 'phone' =>'156754389', 'birthday' =>'2000-01-01', 'type_doc_id' =>1, 'gender_id' =>1, 'force_id'=>3, 'nationality_id' =>4,'sport_id'=>1,'photo'=>'https://img.freepik.com/foto-gratis/retrato-joven-sonriente-gafas_171337-4842.jpg'],
        ]);
    }
}
