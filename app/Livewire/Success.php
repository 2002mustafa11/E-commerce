<?php

namespace App\Livewire;

use Livewire\Component;

class Success extends Component
{
    protected $listeners = ['success' => 'success'];
    public function success()
    {
        // Session()->put('success', 'success');
        session()->flash('success', 'success');
    }
    public function render()
    {
        return view('livewire.success');
    }
}
