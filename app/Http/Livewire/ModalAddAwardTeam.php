<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class ModalAddAwardTeam extends Modal
{
    protected $listeners = ['showModalAddAwardTeam' => "showModal"];

    public function render()
    {

        $team = null;
        if ($this->data) {
            $team =  Team::with([
                "force",
                "disciplineParticipants",
                "disciplineParticipants.participant",
            ])->where("teams.id", "=", $this->data)
                ->first();
        }

        return view('livewire.modal-add-award-team', compact('team'));
    }
}
