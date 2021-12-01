<?php

namespace App\Exports;

use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccountExport implements FromArray, WithHeadings
{
    public $accounts;

    public function headings(): array
    {
        return [
            'کد بورسی',
            'کد ملی',
            ' شیوه ثبت نام',
            'نام و نام خانوادگی',
            'تلفن ثابت',
            'تلفن همراه',
            'تعداد پذیره مطالبات',
            'تعداد پذیره نقدی',
            'تعداد پذیره خود اظهاری',
            'تعداد کل پذیره پرداخت شده',
        ];
    }

    public function array(): array
    {
        $this->getData();
        return $this->accounts;
    }

    public function getData()
    {
        $accounts =Cache::pull('accountsExport');
        $arr = [];
        foreach ($accounts as $i => $account) {
            $current_stock = 0;
            $money_current_stock = 0;
            $account->sign_up == 1 ? $signup = "خود کاربر" : $signup = "سازمان بورس";
            if ($payment = \App\Models\Payment::where('account_id', $account->id)->first()) {
                if ($payment->gateway_id === null && $payment->local_pay === null) {
                    $current_stock = 0;
                    $money_current_stock = 0;
                    $count_all = 0;
                } elseif ($payment->gateway_id === null && $payment->local_pay !== null) {
                    $current_stock = 0;
                    $money_current_stock = $account->current_stock;
                    $count_all = \App\Models\SelfReport::where('account_id', $account->id)->sum('count') + $account->current_stock;
                } elseif ($payment->gateway_id !== null && $payment->local_pay !== null) {
                    $current_stock = $account->money_current_stock;
                    $money_current_stock = $account->current_stock;
                    $count_all = \App\Models\SelfReport::where('account_id', $account->id)->sum('count') + $account->all_stock;
                }

            } else {

                $count_all = \App\Models\SelfReport::where('account_id', $account->id)->sum('count');
            }
            $arr[$i] = [
                $account->stock_alpha . $account->stock_number
                ,
                $account->national_id
                ,
                $signup
                ,
                $account->first_name . " " . $account->last_name
                ,

                $account->phone
                ,
                $account->mobile
                ,
                $current_stock
                ,
                $money_current_stock
                ,
                \App\Models\SelfReport::where('account_id', $account->id)->sum('count')
                ,
                $count_all
            ];
        }
        $this->accounts = $arr;
    }
}
