<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class ExcelImport implements WithMultipleSheets, SkipsOnError, SkipsOnFailure
{

    use WithConditionalSheets, SkipsErrors, SkipsFailures;

    public function conditionalSheets(): array
    {
        return [
            'DEPORTES' =>  new SportsImport(),
            'DISCIPLINAS' =>  new DisciplineImport(),
            'EQUIPOS' =>  new TeamsImport(),
            'PARTICIPANTES' =>  new ParticipantsImport(),
        ];
    }
}
