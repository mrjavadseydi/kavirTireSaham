<div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">وضعیت حق تقدم </h2>

            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        @if (!$payment)
                            @if ($token!=null)
                                <form action="https://ikc.shaparak.ir/iuiv3/IPG/Index/" method="POST" class="text-center">
                                    <input type="hidden" name="tokenIdentity" value="{{$token}}"/>
                                    <input type="submit" class="btn btn-info" value="ورود به درگاه پرداخت"/>
                                </form>
                            @endif

                            <div class="table-responsive"  style="{{$token!=null ? "display:none":''}} ">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>تعداد پذیره</th>
                                        <th>{{$account->all_stock}}</th>
                                    </tr>

                                    <tr>
                                        <th> تعداد پذیره مطالبات</th>
                                        <th>{{$account->current_stock}}</th>
                                    </tr>

                                    <tr>
                                        <th>تعداد پذیره نقدی</th>
                                        <th>{{$account->money_current_stock}}</th>
                                    </tr>

                                    <tr>
                                        <th>مطالبات</th>
                                        <th>{{number_format($account->wallet)}}ریال</th>
                                    </tr>

                                    <tr>
                                        <th>واریز نقدی</th>
                                        <th>{{number_format($account->withdraw)}}
                                            ریال
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>مجموع</th>
                                        <th>{{number_format($account->total)}}
                                            ریال
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        @endif
                        <div style="{{$token!=null ? "display:none":''}} ">
                            @if ($payment)
                                <h5 style="line-height: 25px;">
                                    با عنایت به مجوز افزایش سرمایه به شماره DPM-IOP-00A-120 مورخ 1400/07/12 سازمان بورس
                                    و
                                    پیرو
                                    مصوبات مجمع فوق‌العاده مورخ 1400/07/28،
                                    بدینوسیله تایید می‌گردد
                                    مبلغ
                                    <span class="badge badge-info">
                                    {{$payment->gateway_id==null?number_format($account->current_stock*1000):number_format($account->total)}}
                                </span>
                                    ریال ،
                                    توسط آقا/خانم {{$account->first_name . " " .$account->last_name}}
                                    با کد ملی{{$account->national_id}}
                                    و کد بورسی
                                    <span class="badge badge-info">
                                    {{$account->stock_number.$account->stock_alpha}}
                                </span>

                                    بابت خرید حق تقدم پرداخت گردید.
                                    <br>
                                    شرکت کویرتایر
                                </h5>
                            @else
                                جناب آقای / سرکار خانم:
                                <span class="badge badge-info">
                            {{$account->first_name . " " .$account->last_name}}
                            </span>
                                شما میتوانید برای پرداخت حق تقدم خود از روش های زیر اقدام کنید.
                                <br>
                                جهت پرداخت از طریق مطالبات و آورده نقدی خود (نیازمند پرداخت
                                <span class="badge badge-warning">
                            {{number_format($account->withdraw)}}
                            </span>
                                ریال از طریق درگاه)   بر روی دکمه زیر کلیک کنید .
                                <br>                                <br>

                                <div class="text-center">

                                    <button class="btn btn-success" wire:click="getToken()">
                                        پرداخت از طریق مطالبات و اورده نقدی
                                    </button>


                                </div>
                                @if($account->current_stock !=0)
                                    <br>
                                    جهت پرداخت تنها از طریق مطالبات بر روی دکمه زیر کلیک کنید، توجه کنید که تنها برای
                                    شما
                                    تعداد {{$account->current_stock}} سهم درنظر گرفته خواهد شد
                                    <br>                                <br>

                                    <div class="text-center">
                                        <button class="btn btn-success" wire:click="OnlyWallet()">
                                            پرداخت از طرق مطالبات
                                        </button>
                                    </div>

                                @endif
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
