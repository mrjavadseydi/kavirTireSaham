<?php

namespace App\Http\Livewire\Admin;

use App\Models\Account;
use App\Models\Payment;
use App\Models\Summery;
use Carbon\Carbon;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Morilog\Jalali\Jalalian;

class Accounts extends LivewireDatatable
{
    public $hideable = 'select';
    public $exportable = true;

    public function builder()
    {
        return Summery::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('شناسه')
                ->filterable()->alignCenter()->searchable(),
            NumberColumn::name('certificate')->label('کد سهامدار')->filterable()->alignCenter()->searchable(),
            Column::callback(['first_name', 'last_name'], function ($first_name, $last_name) {
                return $first_name . " " . $last_name;
            })->label('نام ')->filterable()->alignCenter()->searchable(),
            Column::name('father_name')->label('نام پدر')->filterable()->alignCenter()->searchable(),
            Column::name('phone')->label('تلفن ثابت')->filterable()->alignCenter()->searchable(),
            Column::name('mobile')->label('تلفن همراه')->filterable()->alignCenter()->searchable(),
            Column::name('certificate_id')->label('شماره شناسنامه')->filterable()->alignCenter()->searchable(),
            Column::callback(['stock_number', 'stock_alpha'], function ($stock_number, $stock_alpha) {
                return $stock_number . $stock_alpha;
            })->label('کد بورسی ')->filterable()->alignCenter()->searchable(),
            Column::name('national_id')->label('کد ملی')->filterable()->alignCenter()->searchable(),
            NumberColumn::name('all_stock')->label('تعداد پذیرنده')->filterable()->alignCenter()->searchable(),
            NumberColumn::name('current_stock')->label('تعداد پذیره مطالبات')->filterable()->alignCenter()->searchable(),
            NumberColumn::name('money_current_stock')->label('تعداد پذیره نقدی')->filterable()->alignCenter()->searchable(),
            NumberColumn::name('wallet')->label('مطالبات')->filterable()->alignCenter()->searchable(),
            NumberColumn::name('withdraw')->label('واریز نقدی')->filterable()->alignCenter()->searchable(),
            NumberColumn::name('total')->label('جمع مبلغ')->filterable()->alignCenter()->searchable(),
            Column::callback(['has_login','last_login'], function ($has_login, $last_login) {
                if($has_login){
                    return  Jalalian::fromCarbon(new Carbon($last_login));
                }else{
                    return "بدون ورود";
                }
            })->label('ورود؟')->filterable()->alignCenter()->searchable(),
            Column::callback(['payment_created','account_id','local_pay','gateway_id'], function ($payment_created,$account_id,$local_pay,$gateway_id) {
                return $this->getPayStatus($payment_created,$account_id,$local_pay,$gateway_id);
            })->label('پرداخت ')->alignCenter()->searchable(),

        ];
    }
    public function getPayStatus($payment_created,$account_id,$local_pay,$gateway_id){
        if(!$payment_created){
            return "پرداختی انجام نشده";
        }elseif ($gateway_id===null&&$local_pay!==null){
            return "پرداخت از طریق مطالبات";
        }elseif($gateway_id===null&&$local_pay===null){
            return "انصراف از حق تقدم";
        }else{
            return  "پرداخت از طریق مطالبات و نقدی";
        }
    }
}
