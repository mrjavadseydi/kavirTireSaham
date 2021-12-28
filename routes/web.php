<?php


use App\Models\Payment;
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

Route::get('/', \App\Http\Livewire\LoginIndex::class)->name('log');
Route::get('/signup', \App\Http\Livewire\Signup::class)->name('reg');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect(\route('admin.panel'));
})->name('dashboard');


Route::prefix('panel')->middleware('AcoountLogin')->group(function () {
    Route::get('/', \App\Http\Livewire\User\Panel::class)->name('user.panel');
    Route::get('/self-report',\App\Http\Livewire\User\SelfReport::class)->name('user.report');
    Route::get('/print',function (){
        $account = session('account');
        $account->sign_up == 1 ? abort(403):'';
        return view('print',compact('account'));
    })->name('print');
    Route::get('/print-resid',function (){
        $account = session('account');
        $account->sign_up == 1 ? abort(403):'';
        $payment = Payment::where('account_id',$account['id'])->first();
        return view('livewire.user.print',compact('account','payment'));
    })->name('print-resid');
});
Route::get('/logout', function () {
    session()->flush();
    return redirect(url('/'));
})->name('logout');
Route::post('/payment', [\App\Http\Controllers\PaymentController::class,'payment']);
Route::middleware('auth')->prefix('admin')->group(function (){
    Route::get('/panel',\App\Http\Livewire\Admin\Status::class)->name('admin.panel');
    Route::get('/payments',\App\Http\Livewire\Admin\Pay::class)->name('admin.payments');
    Route::get('/users',\App\Http\Livewire\Admin\Panel::class)->name('admin.users');
    Route::get('/self-report',\App\Http\Livewire\Admin\SelfReport::class)->name('admin.self-report');
    Route::get('/pay',\App\Http\Livewire\Admin\Pay::class)->name('admin.paylist');
    Route::get('/gateway',\App\Http\Livewire\Admin\Gateway::class)->name('admin.gateway');
});
Route::view('print','print');
//Route::view('log')
Route::get('/log',function (){
//    \Illuminate\Support\Facades\Artisan::call('migrate');
//    session(['account'=>\App\Models\Account::whereId(44578)->first()]);
    session(['account'=>\App\Models\Account::whereId(35444)->first()]);
    return redirect(url('/panel'));
});
