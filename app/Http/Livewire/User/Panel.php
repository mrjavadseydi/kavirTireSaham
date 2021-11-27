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
    public function mount(){
        $this->account = session('account');
        $this->payment = Payment::where('account_id',$this->account['id'])->first();
        if (session()->has('payment')&&session('payment')=='success') {
            $this->dispatchBrowserEvent('toast', ['type' => 'success', 'msg' => 'پرداخت موفق !']);
            session(['payment'=>null]);
        }
    }

    public function getToken(){
        /*
         * پرداخت از طریق مطالبات و اورده نقدی
         * پرداخت از طرق مطالبات
         * تمایل به استفاده از حق تقدم ندارم
         */
        $orderId = time().rand(0,9999);
        $factor_number = uniqid();
        $gateWay = getIranKishToken($this->account->withdraw,$orderId,$factor_number);
        Gateway::create([
            'account_id'=>$this->account->id,
            'gateway_amount'=>$this->account->withdraw,
            'token'=>$gateWay['result']['token'],
            'tracking_number'=>$orderId,
            'status'=>0,
            'factor_number'=>$factor_number
        ]);
        $this->token = $gateWay['result']['token'];
        $this->dispatchBrowserEvent('toast', ['type' => 'info', 'msg' => 'دکمه ورود به درگاه را انتخاب کنید']);

    }
    public function OnlyWallet(){
            Payment::create([
                'account_id'=>$this->account->id,
                'gateway_id'=>null,
                'local_pay'=>$this->account->current_stock*1000,
            ]);
           return $this->redirect(route('user.panel'));
    }

    public function cancelMe()
    {
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
    public function render()
    {
//        dd($this->payment);
        return view('livewire.user.panel' ,
        [
            'account'=>$this->account,
            'payment'=>$this->payment
        ]
        )->layout('layouts.panel');
    }
}
