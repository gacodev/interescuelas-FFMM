<?php

namespace App\Http\Livewire;
use App\Models\Participant;
use App\Models\Force;
use App\Models\Team;

use Livewire\Component;

class AssignTeamModal extends Modal
{
    protected $listeners = ['showModalTeamAssign' => "showModal"];

    public function render()
    {
        $team = null;
        $participants = null;
        if ($this->data){
            $team = Team::where('teams.id','=', $this->data)->first();
            $force = Force::where('forces.id','=',$team->force_id)->first();
            $participants = Participant::where("participants.force_id", "=", $force->id)->get();
        }

        return view('livewire.assign-team-modal',compact('participants','team'));
    }
}
