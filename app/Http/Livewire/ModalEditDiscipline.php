<?php

namespace App\Http\Livewire;

use App\Models\Discipline;
use App\Models\Sport;

class ModalEditDiscipline extends Modal
{
    protected $listeners = ['showModalEditDiscipline' => "showModal"];

    public function render()
    {

        $discipline = null;
        $sports = null;
        if ($this->data) {
            $discipline =  Discipline::with([
                "sport",
                "gender",
            ])->where("disciplines.id", "=", $this->data)
                ->first();

            $sports = Sport::all();
        }

        return view('livewire.modal-edit-discipline', compact('discipline', 'sports'));
    }
}
