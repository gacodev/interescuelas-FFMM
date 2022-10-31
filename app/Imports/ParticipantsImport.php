<?php

namespace App\Imports;

use App\Models\Blood;
use App\Models\Force;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Participant;
use App\Models\Type_doc;
use App\Models\Discipline;
use App\Models\Sport;
use App\Models\Team;
use Carbon\Carbon;
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
use PhpOffice\PhpSpreadsheet\Shared\Date;


class ParticipantsImport implements ToModel, SkipsEmptyRows, WithBatchInserts, WithHeadingRow, WithChunkReading, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Participant([
            'force_id' => $row['fuerza'],
            'name' => $row['nombre'],
            'type_doc_id' => $row['tipo_de_documento'],
            'identification' => $row['documento'],
            'nationality_id' => $row['nacionalidad'],
            'birthday' => $row['fecha_de_nacimiento'],
            'gender_id' => $row['sexo'],
            'blood_id' => $row['sangre'],
            'height' => $row['estatura'],
            'weight' => $row['peso'],
            'photo' => $row['fotografia'],
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
            'tipo_de_documento' => [
                'required',
                'integer',
            ],
            'documento' => [
                'required',
                'string',
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
                'integer',
                'nullable'
            ],
            'estatura' => [
                'nullable',
            ],
            'peso' => [
                'nullable'
            ],
            'fecha_de_nacimiento' => [
                'string',
                'nullable'
            ],
        ];
    }

    public function prepareForValidation($row, $index)
    {
        $row['nombre'] = strtoupper(trim($row['nombre']));

        $row['fuerza'] = strtolower(trim($row['fuerza']));
        $force = Force::where("force", "like", "%{$row['fuerza']}%")->first();
        $row['fuerza'] =  $force && $row['fuerza'] ? $force->id : null;
        $row['tipo_de_documento'] = strtolower(trim($row['tipo_de_documento']));
        $tipo_de_documento = Type_doc::where("doc_type", "like", "%{$row['tipo_de_documento']}%")->first();
        $row['tipo_de_documento'] =  $tipo_de_documento  && $row['tipo_de_documento'] ? $tipo_de_documento->id : null;

        $row['nacionalidad'] = strtolower(trim($row['nacionalidad']));
        $nationality = Nationality::where("nationality", "like", "%{$row['nacionalidad']}%")->first();
        $row['nacionalidad'] =  $nationality && $row['nacionalidad'] ? $nationality->id : null;

        $row['sexo'] = strtolower(trim($row['sexo']));
        $gender = Gender::where("sexo", "like", "%{$row['sexo']}%")->first();
        $row['sexo'] =  $gender && $row['sexo'] ? $gender->id : null;

        $row['sangre'] = (string) $row['sangre'];
        $row['sangre'] = trim($row['sangre']);
        $blood = Blood::where("type", "like", "%{$row['sangre']}%")->first();
        $row['sangre'] =  $blood  && $row['sangre'] ? $blood->id : null;

        $row['documento'] = (string) trim($row['documento']);

        $row['fotografia'] =  "images/{$row['documento']}.webp";

        $patern = "/^([1-9]|0[1-9]|[1-2][0-9]|3[0-1])(-|\/)([1-9]|0[1-9]|1[0-2])(-|\/)[0-9]{4}$/";
        if (preg_match($patern, $row['fecha_de_nacimiento'])) {
            $row['fecha_de_nacimiento'] = str_replace("/", "-",  $row['fecha_de_nacimiento']);
            $row['fecha_de_nacimiento'] = date("Y-m-d", strtotime($row['fecha_de_nacimiento']));
        } else {
            $row['fecha_de_nacimiento'] = Carbon::instance(Date::excelToDateTimeObject((int)$row['fecha_de_nacimiento']))->format('Y-m-d');
        }




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
