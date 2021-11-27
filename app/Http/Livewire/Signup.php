<?php

namespace App\Http\Livewire;

use App\Models\Account;
use Livewire\Component;

class Signup extends Component
{
    public $certificate,$stock_count,$fname ,$lname,$father,$phone,$mobile,$cert_id,$st_num,$st_alp,$nat_id,$address,$post_code;
    public $signup_step = 1;
    public function signup(){
//        return $this->render();
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
                    'all_stock'=>$this->stock_count,
                    'money_current_stock'=>$this->stock_count,
                    'current_stock'=>0,
                    'wallet'=>0,
                    'withdraw'=>$this->stock_count*1000,
                    'total'=>$this->stock_count*1000,
                    'stock_alpha'=>$this->st_alp,
                    'stock_number'=>$this->st_num,
                    'sign_up'=>true,
                ]);
                session(['account' => $account]);
                return $this->redirect(route('user.panel'));
            }
        }
    }
    public function beforeStep(){
        $this->signup_step--;
    }
    public function render()
    {
        return view('signup')->layout('layouts.auth');
    }
}
