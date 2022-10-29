<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;

class ModalAddAward extends Modal
{

    protected $listeners = ['showModal' => "showModal"];

    public function render()
    {
        $participant = null;
        if ($this->data) {
            $participant = Participant::with([
                "disciplineParticipants" => function ($query) {
                    $query->whereNull('discipline_participants.team_id');
                },
                "disciplineParticipants.award",
                "disciplineParticipants.discipline",
                "disciplineParticipants.discipline.sport",
                "force",
                "nationality",
            ])
                ->where("participants.id", "=", $this->data)
                ->first();
        }

        return view('livewire.modal-add-award', compact('participant'));
    }
}
