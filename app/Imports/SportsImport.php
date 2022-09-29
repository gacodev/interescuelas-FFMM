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


class SportsImport implements ToModel, SkipsEmptyRows, WithBatchInserts, WithHeadingRow, WithChunkReading, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Sport([
            'sport' => $row['sport'],
            'description' => "",
            'sport_image' => "",
        ]);
    }

    public function rules(): array
    {
        return [
            'sport' => [
                'required',
                'string',
                'unique:sports'
            ],
        ];
    }

    public function prepareForValidation($row, $index)
    {
        $row['sport'] = strtoupper(trim($row['deportes']));

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
