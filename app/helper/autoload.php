<?php

use App\Models\Account as Account;
if(!function_exists('randomAlpha')){
    function randomAlpha(){
        $str = "ضصثقفعهخحجچگکمنتالبیسشظطزرذدپ";
        $array = mb_str_split($str);
        $str = '';
        for ($i=0;$i<3;$i++){
            $str.=$array[rand(0,count($array)-1)];
        }
        return $str;
    }
}
if(!function_exists('randomName')) {
    function randomName()
    {
        $person = Account::inRandomOrder()->first();
        return $person->first_name . " " . $person->last_name;
    }
}
if(!function_exists('randomFatherName')) {

    function randomFatherName()
    {
        $person = Account::inRandomOrder()->first();
        return $person->father_name;
    }

}
