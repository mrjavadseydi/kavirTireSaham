<div>
    <div>
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
                                    <div class="col-md-4 p-1">
                                        <input name="stock_number" class="form-control" type="number"
                                               placeholder="بخش عددی کد بورسی"
                                               value="{{request()->has('stock_number')? request('stock_number'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="stock_alpha" class="form-control" placeholder="بخش حرفی کد بورسی"
                                               value="{{request()->has('stock_alpha')? request('stock_alpha'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="national_id" class="form-control" type="number"
                                               placeholder="کد ملی"
                                               value="{{request()->has('national_id')? request('national_id'):""}}">
                                    </div>

                                    <div class="col-md-4 p-1">
                                        <input name="tracking_number" class="form-control" placeholder="کد پیگیری"
                                               value="{{request()->has('tracking_number')? request('tracking_number'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="order_id" class="form-control" placeholder="شماره سفارش"
                                               value="{{request()->has('order_id')? request('order_id'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        <input name="factor_id" class="form-control" placeholder="شماره فاکتور"
                                               value="{{request()->has('factor_id')? request('factor_id'):""}}">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        از تاریخ
                                        <input class="form-control datepicker">
                                        <input style="display: none" class="realdate" name="date">
                                    </div>
                                    <div class="col-md-4 p-1">
                                        تا تاریخ
                                        <input class="form-control datepicker1">
                                        <input style="display: none" class="realdate1" name="todate">
                                    </div>

                                </div>
                                <input type="submit" class="btn btn-success" value="فیلتر کن">
{{--                                <input type="submit" class="btn btn-outline-success" name="excel" value="خروجی اکسل">--}}
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">گزارش درگاه</h2>
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
                                            <th>مبلغ پرداختی</th>
                                            <th>علت پرداختی</th>
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
                                                    {{\Morilog\Jalali\Jalalian::fromCarbon(new \Carbon\Carbon($payment->updated_at))->format('Y/m/d H:i')}}
                                                </td>
                                                <td>
                                                    {{number_format($payment->gateway_amount)}}
                                                </td>
                                                <td>
                                                    @if ($payment->type==1)
                                                        خود اظهاری
                                                    @else
                                                        حق تقدم
                                                    @endif

                                                </td>
                                                <td>
                                                    {{$payment->tracking_number}}
                                                </td>
                                                <td>
                                                    {{$payment->systemTraceAuditNumber}}
                                                </td>
                                                <td>
                                                    {{$payment->factor_number}}
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if (!request()->has('page'))
                                جمع پرداختی های این بازه
                                {{number_format($sum_all)}}
                                ریال
                            @endif

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
