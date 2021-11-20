<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Payment extends Component
{
    public function render()
    {
        return view('livewire.admin.payment')->layout('layouts.admin');
    }
}
