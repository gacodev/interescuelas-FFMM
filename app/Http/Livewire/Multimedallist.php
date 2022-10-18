<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;

class Multimedallist extends Component
{
    public $award_id = null;
    public $sport_id;
    public $discipline_id;

    public function render()
    {
        $participants = Participant::with([
            "disciplineParticipants",
            "disciplineParticipants.award",
            "disciplineParticipants.discipline",
            "disciplineParticipants.discipline.sport",
            "force",
            "nationality",
        ])->paginate(5);

        /*
        if ($this->sport_id) {
            $participants = $participants->where("sport_id", "=", $this->sport_id);
        } else if ($this->discipline_id) {
            $participants = $participants->where("discipline_id", "=", $this->discipline_id);
        }
        */

        return view('livewire.multimedallist', compact('participants'));
    }
}
