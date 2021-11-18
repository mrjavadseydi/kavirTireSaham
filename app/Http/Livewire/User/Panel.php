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
    public function mount(){
        $this->account = session('account');
        $this->payment = Payment::where('account_id',$this->account['id'])->first();
    }

    public function getToken(){

        /*
         * پرداخت از طریق مطالبات و اورده نقدی
         * پرداخت از طرق مطالبات
         * تمایل به استفاده از حق تقدم ندارم
         */
//        if ($this->account->withdraw==0) {
//            Payment::create([
//                'account_id'=>$this->account->id,
//                'gateway_id'=>null,
//                'local_pay'=>$this->account->total,
//            ]);
//           return  $this->render();
//        }else{
            $gateWay = getIranKishToken($this->account->withdraw,rand(1,9999));
            dd($gateWay);
//            Gateway::create([
//                ''
//            ])
//        }
    }
    public function OnlyWallet(){
            Payment::create([
                'account_id'=>$this->account->id,
                'gateway_id'=>null,
                'local_pay'=>$this->account->current_stock*1000,
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
