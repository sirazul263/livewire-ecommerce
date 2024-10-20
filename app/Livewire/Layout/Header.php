<?php

namespace App\Livewire\Layout;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Livewire\Component;

class Header extends Component
{
    public function logout()
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.layout.header');
    }
}
