<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                "grade" => "CT1",
                "force_id" => 1,
            ],
            [
                "grade" => "CT2",
                "force_id" => 1,
            ],
            [
                "grade" => "CT3",
                "force_id" => 1,
            ],
            [
                "grade" => "ALF",
                "force_id" => 1,
            ],
            [
                "grade" => "cadete 1",
                "force_id" => 2,
            ],
            [
                "grade" => "Cadete 2",
                "force_id" => 2,
            ],
            [
                "grade" => "Cadete 3",
                "force_id" => 2,
            ],
            [
                "grade" => "Alferez",
                "force_id" => 2,
            ],
            [
                "grade" => "CT1",
                "force_id" => 3,
            ],
            [
                "grade" => "CT2",
                "force_id" => 3,
            ],
            [
                "grade" => "CT3",
                "force_id" => 3,
            ],
            [
                "grade" => "ALF",
                "force_id" => 3,
            ],
            [
                "grade" => "CT1",
                "force_id" => 4,
            ],
            [
                "grade" => "CT2",
                "force_id" => 4,
            ],
            [
                "grade" => "CT3",
                "force_id" => 4,
            ],
            [
                "grade" => "ALF",
                "force_id" => 4,
            ],
        ];

        foreach ($datas as $data) {
            Grade::create($data);
        }
    }
}
