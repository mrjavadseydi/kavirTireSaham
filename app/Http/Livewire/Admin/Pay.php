<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class Pay extends Component
{
    use WithPagination;
    public  $payments;
    public function getPayments(){
        $this->payments = \App\Models\Payment::query();
        $this->payments = $this->filter();
        $this->payments = $this->payments->paginate(10);

    }
    public function filter(){
        return $this->payments;
    }
    public function render()
    {

        return view('livewire.admin.pay')->layout('layouts.admin');
    }
}
