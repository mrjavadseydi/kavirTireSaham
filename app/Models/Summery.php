<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summery extends Model
{
    use HasFactory;
    protected $table = 'summery';
    public static function getPaymentProperty(){
        if(!SELF::$payment_created){
            return "پرداختی انجام نشده";
        }elseif (SELF::$gateway_id===null&&SELF::$local_pay!==null){
            return "پرداخت از طریق مطالبات";
        }elseif(SELF::$gateway_id===null&&SELF::$local_pay===null){
            return "انصراف از حق تقدم";
        }else{

            return  "پرداخت از طریق مطالبات و نقدی";
        }
    }
}
