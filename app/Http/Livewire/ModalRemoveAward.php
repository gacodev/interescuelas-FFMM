<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;

class ModalRemoveAward extends Modal
{

    protected $listeners = ['showModalRemoveAward' => "showModal"];

    public function render()
    {
        $participant = null;
        if ($this->data) {
            $participant = Participant::with([
                "disciplineParticipants" => function ($query) {
                    $query->whereNull('discipline_participants.team_id')
                        ->whereNotNull('award_id');
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

        return view('livewire.modal-remove-award', compact('participant'));
    }
}
