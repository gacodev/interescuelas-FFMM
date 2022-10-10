<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\WithPagination;

use Livewire\Component;

class Participants extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $participant = Participant::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('identification', 'like', '%' . $this->search . '%')
            ->paginate(6);


        return view('livewire.participants', [
            'participants' => $participant
        ]);
    }
}
