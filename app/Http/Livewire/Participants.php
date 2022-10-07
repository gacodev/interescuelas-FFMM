<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\WithPagination;

use Livewire\Component;

class Participants extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.participants', [
            'participants' => Participant::join('nationalities', 'nationalities.id', '=', 'nationality_id')
                ->join('type_docs', 'type_docs.id', '=', 'type_doc_id')
                ->join('genders', 'genders.id', '=', 'gender_id')
                ->join('forces', 'forces.id', '=', 'force_id')
                ->join('disciplines', 'disciplines.id', '=', 'discipline_id')
                ->join('sports', 'sports.id', '=', 'sport_id')
                ->leftJoin('scores', 'scores.participant_id', '=', 'participants.id')
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('identification', 'like', '%' . $this->search . '%')
                ->paginate(5),
        ]);
    }
}
