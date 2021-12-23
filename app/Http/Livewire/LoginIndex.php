<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;

class LoginIndex extends Component
{
    public $step = 0;

    public $how = "cert_id";
    public $type, $stock_number, $accounts, $stock_alpha, $meta, $name, $account_id, $msg, $cert, $father_name, $phone, $mobile, $certificate_id, $address, $post_code, $export;

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
                $this->accounts = Account::where([['stock_number', $this->stock_number], ['stock_alpha', 'like', "%".$this->stock_alpha."%"]])->get();
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
                $this->accounts = Account::where([['stock_number', $this->stock_number], ['stock_alpha', 'like', "%".$this->stock_alpha."%"], ['id', $this->account_id]])->first();
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

        } elseif ($this->step == 3) {
            if (!$this->cert) {
                $this->alert();
            } else {

                if ($this->how == "cert_id") {
                    $this->accounts = Account::where([['stock_number', $this->stock_number], ['stock_alpha', 'like', "%".$this->stock_alpha."%"], ['id', $this->account_id], ['certificate_id', 'like', $this->cert]])->first();
                } else {
                    $this->accounts = Account::where([['stock_number', $this->stock_number], ['stock_alpha', 'like', "%".$this->stock_alpha."%"], ['id', $this->account_id], ['father_name', 'like', $this->cert]])->first();
                }
                if ($this->accounts) {
                    $ac = $this->accounts;
                    if (!empty($ac->father_name) && !empty($ac->phone) && !empty($ac->mobile) && !empty($ac->certificate_id) && !empty($ac->address) && !empty($ac->post_code) && !empty($ac->export)) {
                        $this->successLogin();
                    } else {

                        $this->dispatchBrowserEvent('toast', ['type' => 'info', 'msg' => 'لطفا مقادیر خواسته شده را تکمیل کنید']);
                        $this->step++;
                    }
                } else {
                    $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'کاربر مورد نظر پیدا نشد']);
                    $this->step = 0;
                    $this->emit('refreshAll');
                }
            }
        } else {
            $ac = $this->accounts;
            $error=false;
            if (empty($ac->father_name)) {
                if(strlen($this->father_name)<2){
                    $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'مقدار فیلد نام پدر صحیح نیست ']);
                    $error=true;
                }else{
                    $ac->update([
                        'father_name'=>$this->father_name
                    ]);
                }
            }
            if (empty($ac->phone)) {
                if(strlen($this->phone)<5||!is_numeric($this->phone)){
                    $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'مقدار فیلد تلفن ثابت صحیح نیست ']);
                    $error=true;
                }else{
                    $ac->update([
                        'phone'=>$this->phone
                    ]);
                }
            }
            if (empty($ac->mobile)) {
                if(strlen($this->mobile)!=11||!is_numeric($this->mobile)){
                    $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'مقدار فیلد تلفن همراه صحیح نیست ']);
                    $error=true;
                }else{
                    $ac->update([
                        'mobile'=>$this->mobile
                    ]);
                }
            }
            if (empty($ac->certificate_id)) {
                if(!is_numeric($this->certificate_id)){
                    $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'مقدار فیلد شماره شناسنامه صحیح نیست ']);
                    $error=true;
                }else{
                    $ac->update([
                        'certificate_id'=>$this->certificate_id
                    ]);
                }
            }
            if (empty($ac->address)) {
                if(strlen($this->address)<10){
                    $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'مقدار فیلد ادرس صحیح نیست ']);
                    $error=true;
                }else{
                    $ac->update([
                        'address'=>$this->address
                    ]);
                }
            }
            if (empty($ac->post_code)) {
                if(strlen($this->post_code)<6||!is_numeric($this->post_code)){
                    $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'مقدار فیلد کد پستی صحیح نیست ']);
                    $error=true;
                }else{
                    $ac->update([
                        'post_code'=>$this->post_code
                    ]);
                }
            }
            if (empty($ac->export)) {
                if(strlen($this->export)<2){
                    $this->dispatchBrowserEvent('toast', ['type' => 'error', 'msg' => 'مقدار فیلد محل صدور شناسنامه صحیح نیست ']);
                    $error=true;
                }else{
                    $ac->update([
                        'export'=>$this->export
                    ]);
                }
            }
            if(!$error){
                $this->successLogin();
            }
        }

    }

    public function successLogin()
    {
        session(['account' => $this->accounts]);
        $this->dispatchBrowserEvent('toast', ['type' => 'success', 'msg' => 'ورود موفق']);
        $this->accounts->update([
            'has_login' => true,
            'last_login' => date('Y-m-d H:i:s'),
            'last_ip' => request()->ip()
        ]);
        return $this->redirect(route('user.panel'));
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
