<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Team;
use App\Models\Participant;
use App\Models\TeamParticipant;
use App\Models\Scores;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Teams extends Component
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
        $TeamParticipants =  Team::with([
            "force",
            "disciplineParticipants",
            "disciplineParticipants.participant",
        ])->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('force_id')
            ->paginate(2);

        $total = DB::table('teams')->count();


        //dump($TeamParticipants);
        return view('livewire.teams', compact('TeamParticipants','total'));
    }
}
