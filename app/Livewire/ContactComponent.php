<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class ContactComponent extends Component
{
    #[Title('Contact')]
    public function render()
    {
        return view('livewire.contact-component');
    }
}
