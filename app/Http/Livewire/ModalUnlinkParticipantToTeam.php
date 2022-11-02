<?php

namespace App\Http\Livewire;

use App\Models\DisciplineParticipant;
use App\Models\Team;
use Livewire\Component;

class ModalUnlinkParticipantToTeam extends Modal
{

    protected $listeners = ['showModalUnlikParticipantToTeam' => "showModal"];

    public function render()
    {

        $disciplineParticipant = null;
        if ($this->data) {
            $disciplineParticipant =  DisciplineParticipant::with([
                "discipline",
                "participant",
                "team",
            ])->where("discipline_participants.id", "=", $this->data)
                ->first();
        }

        return view('livewire.modal-unlink-participant-to-team', compact('disciplineParticipant'));
    }
}
