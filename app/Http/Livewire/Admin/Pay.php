<?php

namespace App\Http\Livewire\Admin;

use App\Models\Account;
use App\Models\Gateway;
use Livewire\Component;
use Livewire\WithPagination;

class Pay extends Component
{
    use WithPagination;

    public $payment;
    public $stock_number = null, $stock_alpha = null, $national_id = null, $payment_type = null, $tracking_number = null, $order_id = null, $factor_id = null;
    protected $paginationTheme = 'simple-tailwind';
    protected $queryString = ['stock_number', 'stock_alpha', 'national_id', 'payment_type', 'tracking_number', 'order_id', 'factor_id'];

    public function render()
    {
        return view('livewire.admin.pay', [
            'payments' => $this->getPayments()
        ])->layout('layouts.admin');
    }

    public function getPayments()
    {
        $payment = new \App\Models\Payment();
        $payment = $this->filter($payment);
        return $payment->with('account')->paginate(10);

    }

    public function filter($payment)
    {
        if ($this->stock_number) {
            $accounts = Account::where('stock_number', $this->stock_number)->pluck('id');
            $payment = $payment->whereIn('account_id', $accounts);
        }
        if ($this->stock_alpha) {
            $accounts = Account::where('stock_alpha', $this->stock_alpha)->pluck('id');
            $payment = $payment->whereIn('account_id', $accounts);
        }
        if ($this->national_id) {
            $accounts = Account::where('national_id', $this->national_id)->pluck('id');
            $payment = $payment->whereIn('account_id', $accounts);
        }
        if ($this->tracking_number) {
            $track = Gateway::where('tracking_number', $this->tracking_number)->pluck('id');
            $this->payment = $this->payment->whereIn('gateway_id', $track);
        }
        if ($this->order_id) {
            $track = Gateway::where('systemTraceAuditNumber', $this->order_id)->pluck('id');
            $payment = $payment->whereIn('gateway_id', $track);
        }
        if ($this->factor_id) {
            $track = Gateway::where('factor_number', $this->factor_id)->pluck('id');
            $payment = $payment->whereIn('gateway_id', $track);
        }
        if ($this->payment_type) {
            switch ($this->payment_type) {
                case "1":
                    $payment = $payment->where([['gateway_id','!=',null],['local_pay','!=',null],['local_pay','!=',0]]);
                    break;
                    case "2":
                    $payment = $payment->where([['gateway_id','=',null],['local_pay','!=',null],['local_pay','!=',0]]);
                    break;
                    case "3":
                    $payment = $payment->where([['gateway_id','=',null],['local_pay','=',null]]);
                    break;
            }
        }

        return $payment;
    }
}
