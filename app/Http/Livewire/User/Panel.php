<?php

namespace App\Http\Livewire\User;

use App\Models\Payment;
use Livewire\Component;

class Panel extends Component
{
    public $account ;
    public $payment ;
    public function mount(){
        $this->account = session('account');
        $this->payment = Payment::where('account_id',$this->account['id'])->first();
    }
    public function render()
    {
        return view('livewire.user.panel' ,
        [
            'account'=>$this->account,
            'payment'=>$this->payment
        ]
        );
    }
}
