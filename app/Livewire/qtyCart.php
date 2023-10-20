<?php

namespace App\Livewire;

use Livewire\Component;

class qtyCart extends Component
{
    protected $listeners = ['qtyCart' => '$refresh'];

    public function render()
    {
        return view('livewire.qtyCart');
    }
}
