<?php

namespace App\Http\Livewire\Admin;

use App\Exports\AccountExport;
use App\Models\Account;
use App\Models\Payment as Payment;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Panel extends Component
{
    protected $paginationTheme = 'simple-tailwind';
    use WithPagination;
    protected $queryString = ['stock_number', 'stock_alpha', 'national_id', 'payment_type', 'certificate_id', 'phone', 'mobile','excel'];
    public $stock_number = null, $stock_alpha = null, $national_id = null, $payment_type = null, $certificate_id = null, $phone = null, $mobile = null,$excel=null;
    public function getAccounts(){
        $accounts = new Account();
        $accounts = $this->filterAccounts($accounts);
        return  $accounts->paginate(10);
    }
    public function filterAccounts($accounts){
        if ($this->stock_number) {
            $accounts = $accounts->where('stock_number','like', '%'.$this->stock_number.'%');
        }

        if ($this->stock_alpha) {
            $accounts = $accounts->where('stock_alpha','like', '%'. $this->stock_alpha.'%');
        }
        if ($this->national_id) {
            $accounts = $accounts->where('national_id', 'like', '%'.$this->national_id.'%');
        }
        if ($this->mobile) {
            $accounts = $accounts->where('mobile','like', '%'. $this->mobile.'%');
        }
        if ($this->phone) {
            $accounts = $accounts->where('phone','like', '%'. $this->phone.'%');
        }
        if ($this->certificate_id) {
            $accounts = $accounts->where('certificate_id', 'like', '%'.$this->certificate_id.'%');
        }
        if ($this->payment_type) {
            switch ($this->payment_type) {
                case "1":
                    $payment = Payment::where([['gateway_id','!=',null],['local_pay','!=',null],['local_pay','!=',0]])->pluck('account_id');
                    $accounts=$accounts->whereIn('id',$payment);
                    break;
                case "2":
                    $payment =  Payment::where([['gateway_id','=',null],['local_pay','!=',null],['local_pay','!=',0]])->pluck('account_id');
                    $accounts=$accounts->whereIn('id',$payment);
                    break;
                case "3":
                    $payment =  Payment::where([['gateway_id','=',null],['local_pay','=',null]])->pluck('account_id');
                    $accounts=$accounts->whereIn('id',$payment);
                    break;
                case "4":
                    $payment =  Payment::where([['local_pay','!=',null]])->pluck('account_id');
                    $accounts=$accounts->whereIn('id',$payment);
                    break;
            }
        }
        if ($this->excel!==null) {
            Cache::put('accountsExport',$accounts->get());
            $name = uniqid().time().".xlsx";
            Excel::store(new AccountExport(),$name,'public_html');
            $this->redirect(asset("exports/".$name));
        }
        return $accounts;
    }
    public function render()
    {

        return view('livewire.admin.panel',[
            'accounts'=>$this->getAccounts()
        ])->layout('layouts.admin');
    }
}
