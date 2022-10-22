<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

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
            "disciplineParticipants" => function ($query) {
                $query->whereNull('discipline_participants.team_id');
            },
            "disciplineParticipants.award",
            "disciplineParticipants.discipline",
            "disciplineParticipants.discipline.sport",
            "force",
            "nationality",
        ])
            ->whereHas('disciplineParticipants', function ($query) {
                $query->whereNull('team_id');
            })
            ->where(function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('identification', 'like', '%' . $this->search . '%');
            })
            ->paginate(6);

        return view('livewire.participants', [
            'participants' => $participant
        ]);
    }
}
