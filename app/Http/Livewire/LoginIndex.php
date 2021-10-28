<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginIndex extends Component
{
    public function render()
    {
        return view('welcome')->layout('layouts.login');
    }
}
