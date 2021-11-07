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

Route::get('/',\App\Http\Livewire\LoginIndex::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::view('/vv','excel.upload');
Route::post('/testExcel',function (\Illuminate\Http\Request $request){
//        dd($request->has('file'));
//        dd($request->file);
        $filename = uniqid().".".$request->file('file')->extension();
        $request->file('file')->move(public_path('/up'),$filename);
        \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\AccountImport,public_path('/up')."/".$filename);

})->name('ex');

Route::prefix('panel')->middleware('AcoountLogin')->group(function (){
    Route::get('/',\App\Http\Livewire\User\Panel::class)->name('user.panel');
});
