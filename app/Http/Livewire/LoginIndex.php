<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;

class LoginIndex extends Component
{
    public $step = 0;
    public $signup_step = 0;

    public $how = "cert_id";
    public $type,$stock_number,$accounts, $stock_alpha,$meta,$name,$account_id,$msg,$cert;
    public $certificate,$stock_count,$fname ,$lname,$father,$phone,$mobile,$cert_id,$st_num,$st_alp,$nat_id,$address,$post_code;
    public function alert()
    {
        $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'لطفا یک گزینه را انتخاب نمایید']);

    }
    public function login()
    {
        $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'در حال حاضر امکان ورود وجود ندارد لطفا دقایقی دیگر مجددا تلاش کنید']);
        return $this->render();
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
    public function signup(){
        $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'در حال حاضر امکان ثبت نام وجود ندارد لطفا دقایقی دیگر مجددا تلاش کنید']);
        return $this->render();
        if($this->signup_step==1){
            if(empty($this->fname)||empty($this->lname)||empty($this->certificate)||!is_numeric($this->certificate)||empty($this->father)||empty($this->nat_id)||strlen($this->nat_id)!=10){
                $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'لطفا با دقت تمامی فیلد هارا تکمیل کنید ']);
            }else{
                 if (Account::where('national_id',$this->nat_id)->orWhere('certificate',$this->certificate)->first()) {
                     $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'حساب شما از قبل وجود دارد ']);
                 }else{
                     $this->signup_step++;
                 }
            }
        }elseif ($this->signup_step==2){
            if(empty($this->phone)||empty($this->mobile)||empty($this->st_num)||!is_numeric($this->st_num)||empty($this->st_alp)){
                $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'لطفا با دقت تمامی فیلد هارا تکمیل کنید ']);
            }else{
                if (Account::where([['stock_alpha',$this->st_alp],['stock_number',$this->st_num]])->first()) {
                    $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'حساب شما از قبل وجود دارد ']);
                }else{
                    $this->signup_step++;
                }
            }
        }elseif ($this->signup_step==3){
            if(empty($this->stock_count)||!is_numeric($this->stock_count)||$this->stock_count<1||$this->stock_count>1000000||empty($this->cert_id)||empty($this->address)||empty($this->post_code)){
                $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'لطفا با دقت تمامی فیلد هارا تکمیل کنید ']);
            }else{

                $this->dispatchBrowserEvent('toast', ['type' => 'success', 'msg' => 'ثبت نام موفق']);
               $account = Account::create([
                    'has_login'=>true,
                    'last_login'=>date('Y-m-d H:i:s'),
                    'last_ip'=>request()->ip(),
                    'certificate'=>$this->certificate,
                    'first_name'=>$this->fname,
                    'last_name'=>$this->lname,
                    'father_name'=>$this->father,
                    'certificate_id'=>$this->cert_id,
                    'phone'=>$this->phone,
                    'mobile'=>$this->mobile,
                    'national_id'=>$this->nat_id,
                    'address'=>$this->address,
                    'post_code'=>$this->post_code,
                    'all_stock'=>0,
                    'current_stock'=>$this->stock_count,
                    'money_current_stock'=>0,
                    'wallet'=>0,
                    'withdraw'=>$this->stock_count*1000,
                    'total'=>$this->stock_count*1000,
                    'stock_alpha'=>$this->st_alp,
                    'stock_number'=>$this->st_num
                ]);
                session(['account' => $account]);
                return $this->redirect(route('user.panel'));
            }
        }
    }
    public function beforeStep(){
        $this->signup_step--;
    }
    public function activeSignup(){
        if($this->signup_step==0){
            $this->signup_step=1;
        }else{
            $this->signup_step=0;
        }
    }
    public function render()
    {
        return view('welcome', [
            'step' => $this->step,
            'meta' => $this->meta,
            'msg' => $this->msg,
            'signup'=>$this->signup_step
        ])->layout('layouts.login');
    }
}
