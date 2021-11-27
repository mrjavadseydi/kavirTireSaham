<?php

namespace App\Http\Livewire\Admin;

use App\Models\Account;
use App\Models\Gateway;
use Carbon\Carbon;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Models\Payment;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Morilog\Jalali\Jalalian;

class Payments extends LivewireDatatable
{
    public $hideable = 'select';
    public $exportable = true;

    public function builder()
    {
        return Payment::query();
    }
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('شناسه')
                ->filterable()->alignCenter()->searchable(),
            Column::callback(['account_id'],function ($account_id){
                $account = Account::find($account_id);
                return $account->stock_alpha . $account->stock_number;
            })->label('کد بورسی')->searchable()->filterable()->alignCenter(),
            Column::callback(['account_id','id'],function ($account_id){
                $account = Account::find($account_id);
                return $account->first_name . " ". $account->last_name;
            })->label('نام و نام خانوادگی')->searchable()->filterable()->alignCenter(),
            Column::callback(['gateway_id','local_pay'],function ($gateway_id,$local_pay){
               if ($gateway_id==null&&$local_pay==null) {
                   return "انصراف از حق تقدم";
               } elseif ($gateway_id==null){
                   return  "پرداخت از طریق مطالبات";
               }elseif ($gateway_id!=null&&$local_pay!=null) {
                   return  "پرداخت از طریق مطالبات و نقدی";
               }
            })->label('پرداخت؟')->searchable()->filterable([
                'انصراف از حق تقدم',
                'پرداخت از طریق مطالبات',
                'پرداخت از طریق مطالبات و نقدی'
            ])->alignCenter(),
            Column::callback(['created_at'],function ($created_at){
                return Jalalian::fromCarbon(new Carbon($created_at));
            })->label('زمان پرداخت')->filterable()->alignCenter(),
            Column::callback(['gateway_id','updated_at'],function ($gateway_id){
                if ($gateway_id) {
                    return number_format(Gateway::whereId($gateway_id)->first()->gateway_amount);
                }else{
                    return 0;
                }
            })->label('مبلغ درگاه')->filterable()->alignCenter(),
            Column::callback(['local_pay','updated_at'],function ($local_pay){
                if($local_pay>0){
                    return number_format($local_pay);
                }else{
                    return 0;
                }
            })->label('مبلغ پرداخت از مطالبات')->filterable()->alignCenter(),
            Column::callback(['gateway_id'],function ($gateway_id){
                if ($gateway_id!=null) {
                    return Gateway::whereId($gateway_id)->first()->systemTraceAuditNumber;
                }
                return '';

            })->label('کد پیگیری درگاه')->searchable()->filterable()->alignCenter(),
            Column::callback(['gateway_id','id'],function ($gateway_id){
                if ($gateway_id!=null) {
                    return Gateway::whereId($gateway_id)->first()->tracking_number;
                }
                return '';

            })->label('شماره سفارش')->searchable()->filterable()->alignCenter(),
            Column::callback(['gateway_id','id','updated_at'],function ($gateway_id){
                if ($gateway_id!=null) {
                    return Gateway::whereId($gateway_id)->first()->factor_number;
                }
                return '';

            })->label('شماره فاکتور')->searchable()->filterable()->alignCenter(),
        ];
    }
}
