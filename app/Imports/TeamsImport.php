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


class TeamsImport implements ToModel, SkipsEmptyRows, WithBatchInserts, WithHeadingRow, WithChunkReading, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Team([
            'name' => $row['nombre_equipo'],
            'force_id' => $row['fuerza'],
            'sport_id' => $row['deporte'],
            'discipline_id' => $row['disciplina'],
        ]);
    }

    public function rules(): array
    {
        return [
            'disciplina' => [
                'required',
                'integer',
            ],
            'deporte' => [
                'required',
                'integer',
            ],
            'fuerza' => [
                'required',
                'integer',
            ],
        ];
    }

    public function prepareForValidation($row, $index)
    {
        $row['nombre_equipo'] = strtoupper(trim($row['nombre_equipo']));

        $row['fuerza'] = strtoupper(trim($row['fuerza']));
        $fuerza = Force::where("force", "like", "%{$row['fuerza']}%")->first();
        $row['fuerza'] =  $fuerza && $row['fuerza'] ? $fuerza->id : null;

        $row['deporte'] = strtoupper(trim($row['deporte']));
        $deporte = Sport::where("sport", "like", "%{$row['deporte']}%")->first();
        $row['deporte'] =  $deporte && $row['deporte'] ? $deporte->id : null;

        $row['disciplina'] = strtoupper(trim($row['disciplina']));
        $disciplina = Discipline::where("discipline", "like", "%{$row['disciplina']}%")
            ->where("sport_id", "=", $deporte->id)->first();
        $row['disciplina'] =  $disciplina && $row['disciplina'] ? $disciplina->id : null;

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
