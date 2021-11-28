<?php

namespace App\Http\Livewire\User;

use App\Models\Gateway;
use Livewire\Component;

class SelfReport extends Component
{
    public $account;
    public $count, $price,$token=null,$selfReport;
    public function mount()
    {
        $this->account = session('account');
        $this->selfReport = \App\Models\SelfReport::where('account_id',$this->account['id'])->get();

    }
    public function toGateWay(){
        $amount = $this->count*1000;
        $orderId = time().rand(0,9999);
        $factor_number = uniqid();
        $gateWay = getIranKishToken($amount,$orderId,$factor_number);
//        dd($gateWay);

        Gateway::create([
            'account_id'=>$this->account->id,
            'gateway_amount'=>$amount,
            'token'=>$gateWay['result']['token'],
            'tracking_number'=>$orderId,
            'status'=>0,
            'factor_number'=>$factor_number,
            'type'=>1
        ]);
        $this->token = $gateWay['result']['token'];
        $this->dispatchBrowserEvent('toast', ['type' => 'info', 'msg' => 'دکمه ورود به درگاه را انتخاب کنید']);
    }
    public function render()
    {
        return view('livewire.user.self-report')->layout('layouts.panel');
    }
}
