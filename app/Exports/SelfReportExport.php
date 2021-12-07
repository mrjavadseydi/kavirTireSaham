<?php

namespace App\Exports;

use App\Models\Gateway as Gateway;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use \Morilog\Jalali\Jalalian;
class SelfReportExport implements FromArray, WithHeadings
{
    public $payments;

    public function __construct($payments)
    {
        $this->payments = $payments;
    }

    public function array(): array
    {

        $arr = [];
        foreach ($this->payments as $i => $payment) {
            if ($payment->gateway_id) {
                $gateway = Gateway::whereId($payment->gateway_id)->first();
                $tracking = $gateway->tracking_number;
                $systemTraceAuditNumber = $gateway->systemTraceAuditNumber;
                $factor_number = $gateway->factor_number;
            } else {
                $tracking = "";
                $systemTraceAuditNumber = "";
                $factor_number = '';
            }
            $arr[$i] = [
                $payment->account->stock_alpha . $payment->account->stock_number,
                $payment->account->first_name . " " . $payment->account->last_name,
                $payment->account->national_id,
                Jalalian::fromCarbon(new Carbon($payment->updated_at))->format('Y/m/d H:i'),
                number_format($payment->count),
                number_format($payment->count * 1000),
                $tracking,
                $systemTraceAuditNumber,
                $factor_number
            ];
        }
        return $arr;
    }

    public function headings(): array
    {
        return [
            'کد بورسی',
            'نام و نام خانوادگی',
            'کد ملی',
            'زمان پرداخت',
            'تعداد سهام خود اظهاری',
            'مبلغ پرداختی با درگاه',
            'کد پیگیری',
            'شماره سفارش',
            'شماره فاکتور',
        ];
    }
}
