<?php

namespace App\Imports;

use App\Models\Blood as ModelsBlood;
use App\Models\Force;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Participant;
use App\Models\Type_doc;
use App\Models\Blood;
use App\Models\Discipline;
use App\Models\Sport;
use App\Models\Team;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

use Maatwebsite\Excel\Validators\Failure;


class DisciplineImport implements ToModel, SkipsEmptyRows, WithBatchInserts, WithHeadingRow, WithChunkReading, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Discipline([
            'discipline' => $row['discipline'],
            'description' => "",
            'discipline_image' => "",
            'sport_id' => $row['sport'],
            'gender_id' => $row['gender'],
        ]);
    }

    public function rules(): array
    {
        return [
            'discipline' => [
                'required',
                'string',
                'unique:disciplines',
            ],
        ];
    }

    public function prepareForValidation($row, $index)
    {
        $row['discipline'] = strtoupper(trim($row['disciplina']));

        $row['sport'] = null;
        $row['deporte'] = strtoupper(trim($row['deporte']));
        $deporte = Sport::where("sport", "like", "%{$row['deporte']}%")->first();
        $row['sport'] =  $deporte && $row['deporte'] ? $deporte->id : null;

        //dd($row['sport']);

        $row['gender'] = null;
        if (str_contains($row['deporte'], 'FEMENINO')) {
            $row['gender'] = 'FEMENINO';
        } else if (str_contains($row['deporte'], 'MASCULINO')) {
            $row['gender'] = 'MASCULINO';
        }

        $gender = Gender::where("sexo", "like", "%{$row['gender']}%")->first();
        $row['gender'] =  $gender && $row['deporte'] ? $gender->id : null;

        return $row;
    }

    public function batchSize(): int
    {
        return 50;
    }

    public function chunkSize(): int
    {
        return 50;
    }
}
