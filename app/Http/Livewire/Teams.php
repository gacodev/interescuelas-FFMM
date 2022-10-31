<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Team;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Teams extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $teams;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $TeamParticipants =  Team::with([
            "force",
            "disciplineParticipants",
            "disciplineParticipants.participant",
            "disciplineParticipants.discipline.sport",
        ])->orWhere('name', 'like', '%' . $this->search . '%')
            ->orWhereHas('disciplineParticipants.participant', function ($query) {
                $query->Where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('identification', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('disciplineParticipants.discipline.sport', function ($query) {
                $query->Where('sport', 'like', '%' . $this->search . '%');
            })
            ->orderBy('force_id')
            ->paginate(2);

        $total = DB::table('teams')->count();

        return view('livewire.teams', compact('TeamParticipants', 'total'));
    }
}
