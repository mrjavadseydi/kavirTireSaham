<?php

use App\Models\Account as Account;
use App\Models\Gateway as Gateway;
use App\Models\Payment as Payment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Livewire\LoginIndex::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::view('/vv', 'excel.upload');
Route::post('/testExcel', function (\Illuminate\Http\Request $request) {
    $filename = uniqid() . "." . $request->file('file')->extension();
    $request->file('file')->move(public_path('/up'), $filename);
    \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\AccountImport, public_path('/up') . "/" . $filename);

})->name('ex');

Route::prefix('panel')->middleware('AcoountLogin')->group(function () {
    Route::get('/', \App\Http\Livewire\User\Panel::class)->name('user.panel');
});
Route::get('/logout', function () {
    session()->flush();
    return redirect(url('/'));
})->name('logout');
Route::post('/payment', function (\Illuminate\Http\Request $request) {
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
                    'status' => $result['responseCode']
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
            Payment::create([
                'account_id' => $account->id,
                'gateway_id' => $gateway->id,
                'local_pay' => $account->current_stock * 1000,
            ]);
            session(['payment' => 'success']);
            return redirect(\route('user.panel'));
        }
    }
});
