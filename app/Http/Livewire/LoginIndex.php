<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;

class LoginIndex extends Component
{
    public $step = 0;

    public $how = "cert_id";
    public $type,$stock_number,$accounts, $stock_alpha,$meta,$name,$account_id,$msg,$cert;
    public function alert()
    {
        $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'لطفا یک گزینه را انتخاب نمایید']);

    }
    public function login()
    {

//        return $this->render();

//        if(!(request()->ip()=="2.181.250.218"||request()->ip()=="78.38.120.130"||request()->ip()=="94.183.103.242")){
//            $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'سامانه از درسترس خارج شده']);
//
//            return $this->render();
//        }

        if ($this->step == 0) {

            $this->accounts = Account::where('stock_number', $this->stock_number)->get();
            $this->step++;
            foreach ($this->accounts as $account) {
                $this->meta['stock_alpha'][] = $account->stock_alpha;
            }
            for ($i = 0; $i < 5 - count($this->accounts) + 1; $i++) {
                $this->meta['stock_alpha'][] = randomAlpha();
            }
            shuffle($this->meta['stock_alpha']);
        } elseif ($this->step == 1) {
            if (!$this->stock_alpha) {
                $this->alert();
            } else {
                $this->accounts = Account::where([['stock_number', $this->stock_number], ['stock_alpha', 'like', $this->stock_alpha]])->get();
                $this->step++;
                foreach ($this->accounts as $account) {
                    $this->meta['name'][] = [
                        'name' => $account->first_name . " " . $account->last_name,
                        'id' => $account->id
                    ];

                }
                for ($i = 0; $i < 5 - count($this->accounts) + 1; $i++) {
                    $this->meta['name'][] = [
                        'name' => randomName(),
                        'id' => rand(1, 9999)
                    ];
                }
                shuffle($this->meta['name']);
            }

        } elseif ($this->step == 2) {
            if (!$this->account_id) {
                $this->alert();
            } else {
                $this->step++;
                $this->accounts = Account::where([['stock_number', $this->stock_number], ['stock_alpha', $this->stock_alpha], ['id', $this->account_id]])->first();
                if ($this->accounts) {
                    if ($this->accounts->certificate_id != 0) {
                        $this->msg = "شماره شناسنامه خود را انتخاب کنید";
                        $this->meta['step4'][] = $this->accounts->certificate_id;
                        for ($i = 0; $i < 4; $i++) {
                            $this->meta['step4'][] = rand(1, 31241);
                        }
                    } else {
                        $this->msg = "نام پدر را انتخاب کنید";
                        $this->meta['step4'][] = $this->accounts->father_name;
                        for ($i = 0; $i < 4; $i++) {
                            $this->meta['step4'][] = randomFatherName();
                        }
                        $this->how = "father";
                    }
                } else {
                    $this->msg = "نام پدر را انتخاب کنید";
                    $this->how = "father";
                    for ($i = 0; $i < 4; $i++) {
                        $this->meta['step4'][] = randomFatherName();
                    }
                }
                shuffle($this->meta['step4']);
            }

        } else {
            if (!$this->cert) {
                $this->alert();
            } else {
                if ($this->how == "cert_id") {
                    $this->accounts = Account::where([['stock_number', $this->stock_number], ['stock_alpha', $this->stock_alpha], ['id', $this->account_id], ['certificate_id', 'like', $this->cert]])->first();
                } else {
                    $this->accounts = Account::where([['stock_number', $this->stock_number], ['stock_alpha', $this->stock_alpha], ['id', $this->account_id], ['father_name', 'like', $this->cert]])->first();
                }
                if ($this->accounts) {
                    session(['account' => $this->accounts]);
                    $this->dispatchBrowserEvent('toast', ['type' => 'success', 'msg' => 'ورود موفق']);
                    $this->accounts->update([
                        'has_login'=>true,
                        'last_login'=>date('Y-m-d H:i:s'),
                        'last_ip'=>request()->ip()
                    ]);
                    return $this->redirect(route('user.panel'));
                } else {
                    $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'کاربر مورد نظر پیدا نشد']);
                    $this->step = 0;
                    $this->emit('refreshAll');
                }
            }
        }

    }


    public function render()
    {
        return view('login', [
            'step' => $this->step,
            'meta' => $this->meta,
            'msg' => $this->msg,

        ])->layout('layouts.auth');
    }
}
