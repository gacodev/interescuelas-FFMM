<?php

namespace Database\Seeders;

use App\Models\Range;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RangeSeeder extends Seeder
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
                "range" => "CT1",
                "force_id" => 1,
            ],
            [
                "range" => "CT2",
                "force_id" => 1,
            ],
            [
                "range" => "CT3",
                "force_id" => 1,
            ],
            [
                "range" => "ALF",
                "force_id" => 1,
            ],
            [
                "range" => "cadete 1",
                "force_id" => 2,
            ],
            [
                "range" => "Cadete 2",
                "force_id" => 2,
            ],
            [
                "range" => "Cadete 3",
                "force_id" => 2,
            ],
            [
                "range" => "Alferez",
                "force_id" => 2,
            ],
            [
                "range" => "CT1",
                "force_id" => 3,
            ],
            [
                "range" => "CT2",
                "force_id" => 3,
            ],
            [
                "range" => "CT3",
                "force_id" => 3,
            ],
            [
                "range" => "ALF",
                "force_id" => 3,
            ],
            [
                "range" => "CT1",
                "force_id" => 4,
            ],
            [
                "range" => "CT2",
                "force_id" => 4,
            ],
            [
                "range" => "CT3",
                "force_id" => 4,
            ],
            [
                "range" => "ALF",
                "force_id" => 4,
            ],
        ];

        foreach ($datas as $data) {
            Range::create($data);
        }
    }
}
