<div>
    <div style="display: none">
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
                                            <option  value="2" {{(request()->has('payment_type')&& request('payment_type')=="2")?"selected":""}}>پرداخت از مطالبات</option>
                                            <option  value="1" {{(request()->has('payment_type')&& request('payment_type')=="1")?"selected":""}}>پرداخت از مطالبات و اورده نقدی</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="tracking_number" class="form-control" placeholder="کد پیگیری"  value="{{request()->has('tracking_number')? request('tracking_number'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="order_id" class="form-control" placeholder="شماره سفارش"  value="{{request()->has('order_id')? request('order_id'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="factor_id" class="form-control" placeholder="شماره فاکتور"  value="{{request()->has('factor_id')? request('factor_id'):""}}">
                                    </div>

                                </div>
                                <input type="submit" class="btn btn-success" value="فیلتر کن">
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div >

    <div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">خوداظهاری</h2>

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
                                            <th>نام و نام خانوادگی</th>
                                            <th>کد ملی</th>
                                            <th>زمان پرداخت</th>
                                            <th>مبلغ پرداختی با درگاه</th>
                                            <th>تعداد</th>
                                            <th>کد پیگیری</th>
                                            <th>شماره سفارش</th>
                                            <th>شماره فاکتور</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payments as $payment)
                                            <tr>
                                                <td>
                                                    {{$payment->id}}.
                                                </td>
                                                <td>
                                                    {{$payment->account->stock_alpha.$payment->account->stock_number}}
                                                </td>
                                                <td>
                                                    {{$payment->account->first_name." ".$payment->account->last_name}}
                                                </td>
                                                <td>
                                                    {{$payment->account->national_id}}
                                                </td>
                                                <td>
                                                    {{\Morilog\Jalali\Jalalian::fromCarbon(new Carbon\Carbon($payment->created_at))->format('Y/m/d H:i')}}
                                                </td>
                                                <td>
                                                    @if ($payment->gateway_id)
                                                        {{number_format(\App\Models\Gateway::whereId($payment->gateway_id)->first()->gateway_amount)}}
                                                    @endif
                                                </td>
                                                <td>
                                                  {{$payment->count}}
                                                </td>
                                                <td>
                                                    @if ($payment->gateway_id)
                                                        {{\App\Models\Gateway::whereId($payment->gateway_id)->first()->tracking_number}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($payment->gateway_id)
                                                        {{\App\Models\Gateway::whereId($payment->gateway_id)->first()->systemTraceAuditNumber}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($payment->gateway_id)
                                                        {{\App\Models\Gateway::whereId($payment->gateway_id)->first()->factor_number}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <div class="text-center">
                                {{ $payments->links() }}

                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div>
