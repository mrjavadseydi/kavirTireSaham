<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Panel extends Component
{
    public function render()
    {
        return view('livewire.admin.panel')->layout('layouts.admin');
    }
}
