<?php

namespace App\Imports;
use App\Models\Participant;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantsImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Participant::create([
            'force_id'=>strtolower($row['fuerza']),
            'name'=>strtolower($row['nombre']),
            'type_doc_id'=>strtolower($row['tipodedocumento']),
            'identification'=>$row['documento'],
            'nationality_id'=>strtolower($row['nacionalidad']),
            'birthday'=>$row['fechadenacimiento'],
            'gender_id'=>strtolower($row['sexo']),
            'blood_id'=>strtolower($row['sangre']),
            'height'=>$row['estatura'],
            'weight'=>$row['peso'],
            'photo'=>strtolower($row['fotografia']),
            'discipline_id'=>strtolower($row['disciplina']),
            'discipline_id'=>strtolower($row['equipo'])
            ]);
        }
    }
}
