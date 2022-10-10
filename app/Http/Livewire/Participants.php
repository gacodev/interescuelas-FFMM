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
        return view('livewire.participants', [
            'participants' => Participant::
                 where('name', 'like', '%' . $this->search . '%')
                ->orWhere('identification', 'like', '%' . $this->search . '%')
                ->paginate(6)
        ]);
    }
}
