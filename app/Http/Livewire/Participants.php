<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\WithPagination;

use Livewire\Component;

class Participants extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $participant = Participant::with([
            "disciplineParticipants",
            "disciplineParticipants.award",
            "disciplineParticipants.discipline",
            "disciplineParticipants.discipline.sport",
            "force",
            "nationality",
        ])->has('disciplineParticipants.discipline')
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('identification', 'like', '%' . $this->search . '%')
            ->paginate(6);


        return view('livewire.participants', [
            'participants' => $participant
        ]);
    }
}
