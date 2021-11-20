<?php

namespace App\Http\Livewire\User;

use App\Models\Gateway;
use App\Models\Payment;
use Livewire\Component;

class Panel extends Component
{
    public $account ;
    protected $listeners = ['refreshProducts' => '$refresh'];
    public $payment ;
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
        $gateWay = getIranKishToken($this->account->withdraw,$orderId);
        Gateway::create([
            'account_id'=>$this->account->id,
            'gateway_amount'=>$this->account->withdraw,
//            'gateway_amount'=>1000,
            'token'=>$gateWay['result']['token'],
            'tracking_number'=>$orderId,
            'status'=>0
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
        Payment::create([
            'account_id'=>$this->account->id,
            'gateway_id'=>null,
            'local_pay'=>null,
        ]);
        return $this->redirect(route('user.panel'));
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
