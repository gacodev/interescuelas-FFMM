<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Discipline;
use App\Models\Sport;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Disciplines extends Component
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
        $disciplines = Discipline::with([
            "sport",
            "gender",
        ])
            ->where('discipline', 'like', '%' . $this->search . '%')
            ->orWhereHas('sport', function ($query) {
                $query->Where('sport', 'like', '%' . $this->search . '%');
            })
            ->paginate(25);

        $sports = Sport::get();

        $total = DB::table('disciplines')->count();
        return view('livewire.disciplines', compact('disciplines', 'sports', 'total'));
    }
}
