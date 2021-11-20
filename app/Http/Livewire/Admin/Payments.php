<?php

namespace App\Http\Livewire\Admin;

use App\Models\Account;
use App\Models\Gateway;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Models\Payment;
use Mediconesystems\LivewireDatatables\NumberColumn;

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
            Column::callback(['gateway_id','local_pay'],function ($gateway_id,$local_pay){
               if ($gateway_id==null&&$local_pay==null) {
                   return "انصراف از حق تقدم";
               } elseif ($gateway_id==null){
                   return  "پرداخت از طریق مطالبات";
               }elseif ($gateway_id!=null&&$local_pay!=null) {
                   return  " پرداخت از طریق مطالبات و نقدی";
               }
            })->label('پرداخت؟')->searchable()->filterable()->alignCenter(),
            Column::name('created_at')->label('زمان پرداخت')->filterable()->alignCenter(),
            Column::callback(['gateway_id'],function ($gateway_id){
                if ($gateway_id!=null) {
                    return Gateway::find($gateway_id)->systemTraceAuditNumber;
                }
                return '';

            })->label('کد پیگیری درگاه')->searchable()->filterable()->alignCenter(),
        ];
    }
}
