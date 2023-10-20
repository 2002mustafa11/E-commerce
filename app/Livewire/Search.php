<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm;
    public $results=[];

    public function search()
    {
        $this->results = Product::where('name', 'like', "%{$this->searchTerm}%")->get();
        // dd($this->results);
    }

    public function render()
    {
        if (is_null($this->results)) {
            $this->results = [];
        }

    return view('livewire.search', [
        'results' => $this->results,
    ]);
}
}
