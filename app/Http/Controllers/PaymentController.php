<?php

namespace App\Http\Controllers;

use App\Models\Account as Account;
use App\Models\Gateway as Gateway;
use App\Models\Payment as Payment;
use App\Models\SelfReport;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request){
        if ($request->responseCode != '00') {
            return view('faild', [
                'track' => $request->paymentId,
                'token' => $request->token
            ]);
        } else {
            $gateway = Gateway::where([
                [
                    'token', $request->token
                ],
                [
                    'tracking_number', $request->paymentId
                ],
                [
                    'gateway_amount', $request->amount
                ],
                [
                    'status', 0
                ]
            ])->first();
            if (!$gateway) {
                return view('faild', [
                    'track' => $request->paymentId,
                    'token' => $request->token
                ]);
            } else {
                $gateway->update([
                    'systemTraceAuditNumber' => $request->systemTraceAuditNumber
                ]);
                $result = verifyPayment($request->retrievalReferenceNumber, $request->systemTraceAuditNumber, $request->token);

                if ($result['responseCode'] != '00') {
                    $gateway->update([
                        'status' =>0
                    ]);
                    return view('faild', [
                        'track' => $request->paymentId,
                        'token' => $request->token
                    ]);
                }
                $account = Account::whereId($gateway->account_id)->first();
                session(['account' => $account]);
                $gateway->update([
                    'status' => 1,
                ]);
                if($gateway->type==0){
                    Payment::create([
                        'account_id' => $account->id,
                        'gateway_id' => $gateway->id,
                        'local_pay' => $account->current_stock * 1000,
                    ]);
                }elseif($gateway->type == 1){
                    SelfReport::create([
                        'account_id' => $account->id,
                        'gateway_id' => $gateway->id,
                        'count' =>$gateway->gateway_amount/1000
                    ]);
                }elseif($gateway->type == 2){
                    Payment::where('account_id',$account->id)->update([
                        'gateway_id'=>$gateway->id
                    ]);
                }

                session(['payment' => 'success']);
                return redirect(\route('user.panel'));
            }
        }
    }
}
