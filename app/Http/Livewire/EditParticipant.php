<?php

namespace App\Http\Livewire;
use App\Models\Participant;
use Livewire\WithPagination;

use Livewire\Component;
use App\Models\Discipline;
use App\Models\DisciplineParticipant;


class EditParticipant extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $participant = Participant::with([
            "disciplineParticipants",
            "disciplineParticipants.award",
            "disciplineParticipants.discipline",
            "disciplineParticipants.discipline.sport",
            "force",
            "nationality",
        ])->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('identification', 'like', '%' . $this->search . '%')
            ->paginate(6);

        $disciplines = Discipline::get();

        //dd($participant);
        return view('livewire.edit-participant', [
            'participants' => $participant,
            'disciplines' => $disciplines
        ]);
    }


    public function getdisciplinas($participant){
        $disciplinesparticipant = DisciplineParticipant::
        where('participant_id','=', $participant);
        return $disciplinesparticipant;
  }
}
