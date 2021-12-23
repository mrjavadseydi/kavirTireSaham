<?php

namespace App\Http\Livewire\Admin;

use App\Models\Account;
use App\Models\Gateway;
use App\Models\Payment as Payment;
use Carbon\Carbon;
use Livewire\Component;

class Status extends Component
{
    public $alluser;
    public $loged_in;
    public $total_gateway;
    public $local_pay;
    public $canceled;
    public $today_login;
    public $today_gateway;
    public $today_local;
    public $sings_up;
    public $today_sings_up;
    public function mount(){
        $this->alluser = Account::count();
        $this->loged_in = Account::where('has_login',true)->count();
        $this->total_gateway = Gateway::where('status',1)->sum('gateway_amount');
        $this->local_pay = Payment::sum('local_pay');
        $this->canceled = Payment::where([['local_pay',null],['gateway_id',null]])->count();
        $before = Carbon::now()->startOfDay();
        $this->today_login = Account::where('last_login',">",$before)->count();
        $this->today_local = Payment::where('created_at','>',$before)->sum('local_pay');
        $this->today_gateway = Gateway::where([['updated_at','>',$before],['status',1]])->sum('gateway_amount');

        $this->sings_up = Account::where('sign_up',true)->count();
        $this->today_sings_up = Account::where([['sign_up',true],['created_at','>',$before]])->count();

    }
    public function render()
    {
        return view('livewire.admin.status')->layout('layouts.admin');
    }
}
