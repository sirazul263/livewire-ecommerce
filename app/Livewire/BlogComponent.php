<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class BlogComponent extends Component
{
    #[Title('Blog')]
    public function render()
    {
        return view('livewire.blog-component');
    }
}
