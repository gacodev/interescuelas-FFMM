<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class ModalRemoveAwardTeam extends Modal
{

    protected $listeners = ['showModalRemoveAwardTeam' => "showModal"];

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

        return view('livewire.modal-remove-award-team', compact('team'));
    }
}
