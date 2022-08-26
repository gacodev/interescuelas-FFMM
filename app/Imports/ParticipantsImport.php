<?php

namespace App\Imports;
use App\Models\Participant;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ParticipantsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Participant::create([
            'force_id'=>$row[0],
            'name'=>$row[1],
            'type_doc_id'=>$row[2],
            'identification'=>$row[3],
            'nationality_id'=>$row[4],
            'birthday'=>$row[5],
            'gender_id'=>$row[6],
            'blood_id'=>$row[7],
            'height'=>$row[8],
            'weight'=>$row[9],
            'photo'=>$row[10],
            'category_id'=>$row[11]
            ]);
        }
    }
}
