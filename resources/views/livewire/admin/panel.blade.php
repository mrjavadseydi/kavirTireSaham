<div>
    <div >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">فیلتر</h2>

                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form>
                                <div class="row">
                                    <div class="col-md-2 p-1">
                                        <input name="stock_number" class="form-control" type="number" placeholder="بخش عددی کد بورسی" value="{{request()->has('stock_number')? request('stock_number'):""}}">
                                    </div>
                                    <div class="col-md-2 p-1">
                                        <input name="stock_alpha" class="form-control" placeholder="بخش حرفی کد بورسی"  value="{{request()->has('stock_alpha')? request('stock_alpha'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="national_id" class="form-control" type="number" placeholder="کد ملی"  value="{{request()->has('national_id')? request('national_id'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <select class="form-control" name="payment_type">
                                            <option value="0">وضعیت پرداخت</option>
                                            <option  value="3" {{(request()->has('payment_type')&& request('payment_type')=="3")?"selected":""}}>انصراف</option>
                                            <option  value="4" {{(request()->has('payment_type')&& request('payment_type')=="4")?"selected":""}}>دارای هرگونه پرداخت</option>
                                            <option  value="2" {{(request()->has('payment_type')&& request('payment_type')=="2")?"selected":""}}>پرداخت از مطالبات</option>
                                            <option  value="1" {{(request()->has('payment_type')&& request('payment_type')=="1")?"selected":""}}>پرداخت از مطالبات و اورده نقدی</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="phone" class="form-control" placeholder="تلفن ثابت"  value="{{request()->has('phone')? request('phone'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="mobile" class="form-control" placeholder="تلفن همراه"  value="{{request()->has('mobile')? request('mobile'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="certificate_id" class="form-control" placeholder="شماره شناسنامه"  value="{{request()->has('certificate_id')? request('certificate_id'):""}}">
                                    </div>

                                </div>
                                <input type="submit" class="btn btn-success" value="فیلتر کن">
                                <input type="submit" class="btn btn-outline-success" name="excel" value="خروجی اکسل">
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div >

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">وضعیت حق تقدم </h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>شناسه</th>
                                        <th>کد بورسی</th>
                                        <th>ثبت نام</th>
                                        <th>نام و نام خانوادگی</th>
                                        <th>تلفن ثابت</th>
                                        <th>تلفن همراه</th>
                                        <th>شماره شناسنامه</th>
                                        <th>کد ملی</th>
                                        <th>تعداد پذیره مطالبات</th>
                                        <th>تعداد پذیره نقدی</th>
                                        <th>مطالبات</th>
                                        <th>واریز نقدی</th>
                                        <th>زمان ورود</th>
                                        <th>نوع پرداخت</th>
                                        <th>تعداد پذیره خود اظهاری</th>
                                        <th>تعداد کل پذیره پرداخت شده</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($accounts as $account)
                                        <tr>
                                            <td>
                                                {{$account->id}}.
                                            </td>
                                            <td>
                                                {{$account->stock_alpha.$account->stock_number}}
                                            </td>
                                            <td>
                                                @if ($account->sign_up==1)
                                                    خود کاربر
                                                @else
                                                    سازمان بورس
                                                @endif
                                            </td>
                                            <td>
                                                {{$account->first_name." ".$account->last_name}}
                                            </td>
                                            <td>
                                                {{$account->phone}}
                                            </td>
                                            <td>
                                                {{$account->mobile}}
                                            </td>
                                            <td>
                                                {{$account->certificate_id	}}
                                            </td>
                                            <td>
                                                {{$account->national_id}}
                                            </td>
                                            <td>
                                                {{number_format($account->current_stock)}}
                                            </td>
                                            <td>
                                                {{number_format($account->money_current_stock)}}
                                            </td>
                                            <td>
                                                {{number_format($account->wallet)}}
                                            </td>
                                            <td>
                                                {{number_format($account->withdraw)}}
                                            </td>
                                            <td>
                                                @if ($account->has_login)
                                                    {{\Morilog\Jalali\Jalalian::fromCarbon(new \Carbon\Carbon($account->last_login))}}
                                                @else
                                                    بدون ورود
                                                @endif
                                            </td>
                                            <td>
                                                @if($payment = \App\Models\Payment::where('account_id',$account->id)->first())
                                                    @if ($payment->gateway_id===null&&$payment->local_pay===null)
                                                        انصراف از حق تقدم
                                                    @elseif($payment->gateway_id===null&&$payment->local_pay!==null)
                                                        پرداخت از مطالبات
                                                    @elseif($payment->gateway_id!==null&&$payment->local_pay!==null)
                                                        پرداخت از مطالبات و اورده نقدی
                                                    @endif

                                                @else
                                                بدون پرداخت
                                                @endif
                                            </td>
                                            <td>
                                                {{\App\Models\SelfReport::where('account_id',$account->id)->sum('count')}}
                                            </td>
                                            <td>
                                                @if($payment)
                                                    @if($payment->gateway_id===null&&$payment->local_pay!==null)
                                                       {{\App\Models\SelfReport::where('account_id',$account->id)->sum('count')+$account->current_stock}}
                                                    @elseif($payment->gateway_id!==null&&$payment->local_pay!==null)
                                                        {{\App\Models\SelfReport::where('account_id',$account->id)->sum('count')+$account->all_stock}}

                                                    @endif

                                                @else
                                                    {{\App\Models\SelfReport::where('account_id',$account->id)->sum('count')}}

                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>

                        </div>
                        <div class="text-center">
                            {{ $accounts->links() }}

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
