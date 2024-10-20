<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class CheckoutComponent extends Component
{
    #[Title('Checkout')]
    public function render()
    {
        return view('livewire.checkout-component');
    }
}
