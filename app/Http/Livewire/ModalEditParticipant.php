<?php

namespace App\Http\Livewire;

use App\Models\Blood;
use App\Models\Gender;
use App\Models\Participant;
use Livewire\Component;

class ModalEditParticipant extends Modal
{

    protected $listeners = ['showModalEditParticipant' => "showModal"];

    public function render()
    {
        $participant = null;
        $genders = null;
        $bloods  = null;
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

            $genders = Gender::all();
            $bloods = Blood::all();
        }

        return view('livewire.modal-edit-participant', compact('participant', 'genders', 'bloods'));
    }
}
