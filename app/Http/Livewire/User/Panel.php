<?php

namespace App\Http\Livewire\User;

use App\Models\Gateway;
use App\Models\Payment;
use Livewire\Component;
use function Livewire\str;

class Panel extends Component
{
    public $account ;
    protected $listeners = ['refreshProducts' => '$refresh'];
    public $payment ,$shaba ;
    public $token = null ;
    public $successPay=false;
    public function mount(){
        $this->account = session('account');

        $this->payment = Payment::where('account_id',$this->account['id'])->first();

    }

    public function getSecondToken()
    {
        if($this->HavePayments()){
            $this->dispatchBrowserEvent('toast', ['type' => 'info', 'msg' => 'وضعیت حق تقدم از قبل ثبت شده !']);

        }else {
            $orderId = time() . rand(0, 9999);
            $factor_number = uniqid();
            $gateWay = getIranKishToken($this->account->withdraw, $orderId, $factor_number);
            Gateway::create([
                'account_id' => $this->account->id,
                'gateway_amount' => $this->account->withdraw,
                'token' => $gateWay['result']['token'],
                'tracking_number' => $orderId,
                'status' => 0,
                'factor_number' => $factor_number,
                'type' => 2
            ]);
            $this->token = $gateWay['result']['token'];
            $this->dispatchBrowserEvent('toast', ['type' => 'info', 'msg' => 'دکمه ورود به درگاه را انتخاب کنید']);
        }
    }
    public function getToken(){
        if($this->HavePayments()){
            $this->dispatchBrowserEvent('toast', ['type' => 'info', 'msg' => 'وضعیت حق تقدم از قبل ثبت شده !']);
        }else {
            $orderId = time() . rand(0, 9999);
            $factor_number = uniqid();
            $gateWay = getIranKishToken($this->account->withdraw, $orderId, $factor_number);
            Gateway::create([
                'account_id' => $this->account->id,
                'gateway_amount' => $this->account->withdraw,
                'token' => $gateWay['result']['token'],
                'tracking_number' => $orderId,
                'status' => 0,
                'factor_number' => $factor_number
            ]);
            $this->token = $gateWay['result']['token'];
            $this->dispatchBrowserEvent('toast', ['type' => 'info', 'msg' => 'دکمه ورود به درگاه را انتخاب کنید']);
        }
    }
    public function OnlyWallet(){
        if($this->HavePayments()){
            $this->dispatchBrowserEvent('toast', ['type' => 'info', 'msg' => 'وضعیت حق تقدم از قبل ثبت شده !']);


        }else {
            Payment::create([
                'account_id' => $this->account->id,
                'gateway_id' => null,
                'local_pay' => $this->account->current_stock * 1000,
            ]);
            return $this->redirect(route('user.panel'));
        }
    }

    public function cancelMe()
    {
        if($this->HavePayments()){
            $this->dispatchBrowserEvent('toast', ['type' => 'info', 'msg' => 'وضعیت حق تقدم از قبل ثبت شده !']);


        }else{
            $data = $this->validate([
                'shaba'=>'required|starts_with:IR,ir,Ir|size:26'
            ]);
            Payment::create([
                'account_id'=>$this->account->id,
                'gateway_id'=>null,
                'local_pay'=>null,
                'shaba'=>$data['shaba']
            ]);
            return $this->redirect(route('user.panel'));
        }

    }

    public function HavePayments(): bool
    {
        return (bool)Payment::where('account_id', $this->account['id'])->first();
    }

    public function render()
    {

        return view('livewire.user.panel' ,
        [
            'account'=>$this->account,
            'payment'=>$this->payment
        ]
        )->layout('layouts.panel');
    }
}
