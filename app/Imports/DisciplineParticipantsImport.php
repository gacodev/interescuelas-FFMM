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
use App\Models\DisciplineParticipant;
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
use Throwable;

class DisciplineParticipantsImport implements ToModel, SkipsEmptyRows, WithBatchInserts, WithHeadingRow, WithChunkReading, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new DisciplineParticipant([
            'discipline_id' => $row['disciplina'],
            'participant_id' => $row['participante'],
            'award_id' => null,
            'team_id' => $row['equipo']
        ]);
    }

    /*
    public function onFailure(Failure ...$failures)
    {
        eval(\Psy\sh());
    }

    public function onError(Throwable $e)
    {
        eval(\Psy\sh());
    }
    */

    public function rules(): array
    {
        return [
            'participante' => [
                'integer',
            ],
            'disciplina' => [
                'integer',
            ],
            'equipo' => [
                'integer',
                'nullable'
            ],
        ];
    }

    public function prepareForValidation($row, $index)
    {
        $row['disciplina'] = strtoupper(trim($row['disciplina']));
        $row['deporte'] = strtoupper(trim($row['deporte']));

        $row['documento'] = strtoupper(trim($row['documento']));
        $participante = Participant::where("identification", "=", $row['documento'])->first();
        $row['participante'] =  $participante && $row['documento'] ? $participante->id : null;

        $row['deporte'] = strtoupper(trim($row['deporte']));
        $deporte = Sport::where("sport", "like", "%{$row['deporte']}%")->first();
        $row['sport'] =  $deporte && $row['deporte'] ? $deporte->id : null;

        $discipline = Discipline::where("discipline", "like", "%{$row['disciplina']}%")
            ->where("sport_id", "=", $row['sport'])
            ->first();
        $row['disciplina'] =  $discipline && $row['disciplina'] ? $discipline->id : null;

        $row['equipo'] = strtolower(trim($row['equipo']));
        $team = Team::where("name", "like", "%{$row['equipo']}%")->first();
        $row['equipo'] =  $team && $row['equipo'] ? $team->id : null;

        return $row;
    }

    public function batchSize(): int
    {
        return 1;
    }

    public function chunkSize(): int
    {
        return 1;
    }
}
