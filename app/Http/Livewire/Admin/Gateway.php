<?php

namespace App\Http\Livewire\Admin;

use App\Exports\paymentsExport;
use App\Models\Account;
use App\Models\Gateway as GatewayModel;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Gateway extends Component
{
    use WithPagination;

    protected $paginationTheme = 'simple-tailwind';
    public $stock_number = null, $stock_alpha = null, $national_id = null, $payment_type = null, $tracking_number = null, $order_id = null, $factor_id = null, $date = null, $excel = null, $todate = null;
    protected $queryString = ['stock_number', 'stock_alpha', 'national_id', 'payment_type', 'tracking_number', 'order_id', 'factor_id', 'date', 'excel', 'todate'];

    public function getGateway()
    {
        $gateway = GatewayModel::query()->where('status',1);
        $gateway = $this->filter($gateway);
        return ['payments'=>$gateway->with('account')->paginate(15),'sum_all'=>$gateway->sum('gateway_amount')];
    }
    public function filter($payment)
    {
        if ($this->stock_number) {
            $stock = $this->stock_number;
            $payment = $payment->whereHas('account', function ($q) use($stock) {
                $q->where('stock_number', 'like', '%'.$stock.'%');
            });
        }
        if ($this->stock_alpha) {
            $stock_alpha = $this->stock_alpha;
            $payment = $payment->whereHas('account', function ($q) use($stock_alpha) {
                $q->where('stock_alpha','like', '%'.$stock_alpha);
            });

        }
        if ($this->national_id) {
            $national_id = $this->national_id;
            $payment = $payment->whereHas('account', function ($q) use($national_id) {
                $q->where('national_id', 'like', '%'.$national_id.'%');
            });
        }
        if ($this->tracking_number) {
            $payment = $payment->where('tracking_number','like', '%'. $this->tracking_number.'%');
        }
        if ($this->order_id) {
            $payment = $payment->where('systemTraceAuditNumber', 'like', '%'.$this->order_id.'%');
        }
        if ($this->factor_id) {
            $payment = $payment->where('factor_number','like', '%'. $this->factor_id.'%');
        }

        if ($this->date) {
            $timestamp = $this->date / 1000;
            if ($timestamp < (time() - 200)) {
                $formated = Carbon::createFromTimestamp($timestamp)->toDateTimeString();
                $payment = $payment->where('updated_at', '>', $formated);
            }

        }
        if ($this->todate) {
            $timestamp = $this->todate / 1000;
            $formated = Carbon::createFromTimestamp($timestamp)->toDateTimeString();
            $payment = $payment->where('updated_at', '<', $formated);
        }

        return $payment;
    }
    public function render()
    {
        $data = $this->getGateway();
        $payments = $data['payments'];
        $sum_all = $data['sum_all'];
        return view('livewire.admin.gateway',compact('payments','sum_all'))->layout('layouts.admin');
    }
}
