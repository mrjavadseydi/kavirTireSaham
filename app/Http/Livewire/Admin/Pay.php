<?php

namespace App\Http\Livewire\Admin;

use App\Exports\paymentsExport;
use App\Models\Account;
use App\Models\Gateway;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Pay extends Component
{
    use WithPagination;

    protected $paginationTheme = 'simple-tailwind';

    public $payment;
    public $stock_number = null, $stock_alpha = null, $national_id = null, $payment_type = null, $tracking_number = null, $order_id = null, $factor_id = null, $date = null, $excel = null, $todate = null;
    protected $queryString = ['stock_number', 'stock_alpha', 'national_id', 'payment_type', 'tracking_number', 'order_id', 'factor_id', 'date', 'excel', 'todate'];

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
            $payment = $payment->whereIn('gateway_id', $track);
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
                    $payment = $payment->where([['gateway_id', '!=', null], ['local_pay', '!=', null], ['local_pay', '!=', 0]]);
                    break;
                case "2":
                    $payment = $payment->where([['gateway_id', '=', null], ['local_pay', '!=', null], ['local_pay', '!=', 0]]);
                    break;
                case "3":
                    $payment = $payment->where([['gateway_id', '=', null], ['local_pay', '=', null]]);
                    break;
            }
        }
        if ($this->date) {
            $timestamp = $this->date / 1000;
            if ($timestamp < time() - 1000) {
                $formated = Carbon::createFromTimestamp($timestamp)->toDateTimeString();
                $payment = $payment->where('updated_at', '>', $formated);
            }

        }
        if ($this->todate) {
            $timestamp = $this->todate / 1000;
            $formated = Carbon::createFromTimestamp($timestamp)->toDateTimeString();
            $payment = $payment->where('updated_at', '<', $formated);
        }
        if ($this->excel !== null) {
            $name = uniqid() . time() . ".xlsx";
            Excel::store(new paymentsExport($payment->get()), $name, 'public_html');
            $this->redirect(asset("exports/" . $name));
        }
        return $payment;
    }
}
