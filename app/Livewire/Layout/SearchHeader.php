<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class SearchHeader extends Component
{
    public $search = '';
    public function mount(){
        $this->fill(request()->only('search')) ;
    }

    public function render()
    {
        return view('livewire.layout.search-header' , [
            'search' => $this->search
        ]);
    }
}
