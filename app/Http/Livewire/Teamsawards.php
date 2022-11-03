<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Team;

class Teamsawards extends Component
{
    public function render()
    {
        $teams = Team::join('awards','awards.id','award_id')->get();
        //dd($teams);
        return view('livewire.teamsawards',compact('teams'));
    }
}
