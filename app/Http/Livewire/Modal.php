<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;

abstract class Modal extends Component
{

    public $show;
    public $data;

    public function mount()
    {
        $this->show = false;
    }

    public function showModal($data)
    {
        $this->data = $data;
        $this->doShow();
    }

    public function doShow()
    {
        $this->show = true;
    }

    public function doClose()
    {
        $this->show = false;
    }

    public function doSomething()
    {
        // Do Something With Your Modal

        // Close Modal After Logic
        $this->doClose();
    }
}
