<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;

class ModalAddAward extends Component
{

    public $participant_id;
    public $show;

    protected $listeners = ['showModal'];

    public function mount()
    {
        $this->show = false;
    }

    public function showModal($data)
    {
        $this->participant_id = $data;
        $this->doShow();
    }

    public function doShow()
    {
        $this->show = true;
    }

    public function doClose()
    {
        $this->show = false;
    }

    public function doSomething()
    {
        // Do Something With Your Modal

        // Close Modal After Logic
        $this->doClose();
    }

    public function render()
    {
        $participant = null;
        if ($this->participant_id) {
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
                ->where("participants.id", "=", $this->participant_id)
                ->first();
        }

        return view('livewire.modal-add-award', compact('participant'));
    }
}
