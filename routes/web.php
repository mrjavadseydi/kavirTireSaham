<?php


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
    return redirect(\route('admin.panel'));
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
Route::post('/payment', [\App\Http\Controllers\PaymentController::class,'payment']);
Route::middleware('auth')->prefix('admin')->group(function (){
    Route::get('/panel',\App\Http\Livewire\Admin\Panel::class)->name('admin.panel');
});
