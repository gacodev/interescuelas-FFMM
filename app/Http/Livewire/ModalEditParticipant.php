<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;

class ModalEditParticipant extends Modal
{

    protected $listeners = ['showModalEditParticipant' => "showModal"];

    public function render()
    {
        $participant = null;
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
        }

        return view('livewire.modal-edit-participant', compact('participant'));
    }
}
