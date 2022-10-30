<?php

namespace App\Http\Livewire;

use App\Models\Discipline;
use App\Models\Participant;
use Livewire\Component;

class ModalParticipantLinkDiscipline extends Modal
{
    protected $listeners = ['showModalParticipantLinkDiscipline' => "showModal"];

    public function render()
    {
        $participant = null;
        $disciplines = null;
        if ($this->data) {

            $participant = Participant::with([
                "disciplineParticipants",
                "disciplineParticipants.award",
                "disciplineParticipants.discipline",
                "disciplineParticipants.discipline.sport",
                "force",
                "nationality",
            ])->where("participants.id", "=", $this->data)
                ->first();


            $disciplines = Discipline::get();
        }

        return view('livewire.modal-participant-link-discipline', compact('participant', 'disciplines'));
    }
}
