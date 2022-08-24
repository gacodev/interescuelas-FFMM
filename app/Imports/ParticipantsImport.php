<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\ToModel;

class ParticipantsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Participant([
            'type_doc_id'=>$row['Tipo de documento'],
            'identification'=>$row['Número de identificación '],
            'force_id'=>$row['escuela'],
            'name'=>$row['name'],
            'blood_type'=>$row['Grupo Sanguíneo'],
            'height'=>$row['Estatura'],
            'weight'=>$row['peso'],
            'photo'=>$row['foto'],
            'birthday'=>$row['Fecha de nacimiento'],
            'gender_id'=>$row['sexo'],
            'category_id'=>$row['Disciplina deportiva'],
            'nationality_id'=>$row['Nacionalidad'],
        ]);
    }
}
