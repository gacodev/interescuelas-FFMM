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


class ParticipantsImport implements ToModel, SkipsEmptyRows, WithBatchInserts, WithHeadingRow, WithChunkReading, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Participant([
            'force_id' => $row['fuerza'],
            'name' => $row['nombre'],
            'type_doc_id' => $row['tipo_de_documento'],
            'identification' => $row['identification'],
            'nationality_id' => $row['nacionalidad'],
            'birthday' => $row['fecha_de_nacimiento'],
            'gender_id' => $row['sexo'],
            'blood_id' => $row['sangre'],
            'height' => $row['estatura'],
            'weight' => $row['peso'],
            'photo' => $row['fotografia'],
            'discipline_id' => $row['disciplina'],
            'team_id' => $row['equipo']
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre' => [
                'required',
                'string',
            ],
            'fuerza' => [
                'required',
                'integer',
            ],
            'disciplina' => [
                'required',
                'integer',
            ],
            'tipo_de_documento' => [
                'required',
                'integer',
            ],
            'identification' => [
                'required',
                'integer',
                'unique:participants',
            ],
            'nacionalidad' => [
                'required',
                'integer',
            ],
            'sexo' => [
                'required',
                'integer',
            ],
            'sangre' => [
                'required',
                'integer',
            ],
            'equipo' => [
                'integer',
            ],
            'estatura' => [
                'required',
            ],
            'peso' => [
                'required',
            ],
            'fecha_de_nacimiento' => [
                'required',
            ],
        ];
    }

    public function prepareForValidation($row, $index)
    {
        $row['nombre'] = strtoupper(trim($row['nombre']));

        $row['fuerza'] = strtolower(trim($row['fuerza']));
        $force = Force::where("force", "like", "%{$row['fuerza']}%")->first();
        $row['fuerza'] =  $force ? $force->id : null;

        $row['disciplina'] = strtolower(trim($row['disciplina']));
        $discipline = Discipline::where("discipline", "like", "%{$row['disciplina']}%")->first();
        $row['disciplina'] =  $discipline ? $discipline->id : null;

        $row['tipo_de_documento'] = strtolower(trim($row['tipo_de_documento']));
        $tipo_de_documento = Type_doc::where("doc_type", "like", "%{$row['tipo_de_documento']}%")->first();
        $row['tipo_de_documento'] =  $tipo_de_documento ? $tipo_de_documento->id : null;

        $row['nacionalidad'] = strtolower(trim($row['nacionalidad']));
        $nationality = Nationality::where("nationality", "like", "%{$row['nacionalidad']}%")->first();
        $row['nacionalidad'] =  $nationality ? $nationality->id : null;

        $row['sexo'] = strtolower(trim($row['sexo']));
        $gender = Gender::where("sexo", "like", "%{$row['sexo']}%")->first();
        $row['sexo'] =  $gender ? $gender->id : null;

        $row['sangre'] = strtolower(trim($row['sangre']));
        $blood = Blood::where("type", "like", "%{$row['sangre']}%")->first();
        $row['sangre'] =  $blood ? $blood->id : null;

        $row['equipo'] = strtolower(trim($row['equipo']));
        $team = Team::where("name", "like", "%{$row['equipo']}%")->first();
        $row['equipo'] =  $team ? $team->id : null;

        $row['identification'] = $row['documento'];

        $row['fotografia'] = strtolower($row['fotografia']);

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
