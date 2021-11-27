<?php

namespace App\Imports;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class AccountImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        print("initzial excel...");
//        dd($collection[0],$collection[2]);
        foreach ($collection as $i=> $row){
            if($i==0){
                continue;
            }
            try{
                $stock_id = $row[3];
                preg_match_all('/[0-9]+/',$stock_id, $stock_number);
                if (!isset( $stock_number[0][0])) {
                    continue;
                }
                $stock_number = $stock_number[0][0];
                $stock_alpha = str_replace($stock_number,'',$stock_id);
                if(empty($row[10])||$row[10]==""||$row[10]==" ")
                    $mcs=0;
                else {
                    $mcs=$row[10];
                }
                if($account = Account::where('certificate',$row[0])->first()){
                    print("row $i updated");
                    $account->update([
                        'certificate'=>$row[0],
                        'first_name'=>$row[1],
                        'last_name'=>$row[2],
                        'father_name'=>$row[6],
                        'export'=>$row[7],
                        'certificate_id'=>$row[5],
                        'phone'=>$row[12],
                        'mobile'=>$row[14],
                        'national_id'=>$row[4]??" ",
                        'address'=>$row[11],
                        'post_code'=>$row[13],
                        'all_stock'=>$row[8],
                        'current_stock'=>$row[9],
                        'money_current_stock'=>$mcs,
                        'wallet'=>$row[15],
                        'withdraw'=>$row[16],
                        'total'=>$row[17],
                        'has_login'=>false,
                        'stock_alpha'=>$stock_alpha,
                        'stock_number'=>$stock_number
                    ]);
                }else{
                    print("row $i inserted");

                    Account::create([
                        'certificate'=>$row[0],
                        'first_name'=>$row[1],
                        'last_name'=>$row[2],
                        'father_name'=>$row[6],
                        'export'=>$row[7],
                        'certificate_id'=>$row[5],
                        'phone'=>$row[12],
                        'mobile'=>$row[14],
                        'national_id'=>$row[4]??" ",
                        'address'=>$row[11],
                        'post_code'=>$row[13],
                        'all_stock'=>$row[8],
                        'current_stock'=>$row[9],
                        'money_current_stock'=>$mcs,
                        'wallet'=>$row[15],
                        'withdraw'=>$row[16],
                        'total'=>$row[17],
                        'has_login'=>false,
                        'stock_alpha'=>$stock_alpha,
                        'stock_number'=>$stock_number
                    ]);
                }


            }catch (\Exception $e){
                print ("error in line".$i ."\n");
                exit();
            }

        }
    }

}
