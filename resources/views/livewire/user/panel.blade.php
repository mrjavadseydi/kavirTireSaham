<div>
    <style>
        .has-error {
            border-color: red;
        }

        tr {
            text-align: center;
        }

        th {
            text-align: center;
        }

        table {
            text-align: center;

        }
    </style>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">
                    {{$token==null?"وضعیت حق تقدم":"ورود به درگاه پرداخت"}}
                </h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if (session()->has('payment')&&session()->get('payment')=="success")
                            @php(session(['payment'=>null]))
                            <div class="alert alert-success">
                                <p>
                                    پرداخت شما موفق بود!
                                </p>
                            </div>
                        @endif
                            @if ($token!=null)
                                <div class="text-center" style="text-align: center">
                                    <div style="margin: 0 auto" class="text-center">
                                        <h4 class="text-center">
                                            مبلغ قابل پرداخت برای
                                            {{number_format($account->withdraw)}}
                                            ریال

                                        </h4>
                                    </div>
                                    <img src="{{asset('logo-red.png')}}" class="img-responsive" style="margin: 0 auto"/>
                                    <br>
                                    <form action="https://ikc.shaparak.ir/iuiv3/IPG/Index/" method="POST"
                                          class="text-center">
                                        <input type="hidden" name="tokenIdentity" value="{{$token}}"/>
                                        <input type="submit" class="btn btn-lg btn-info " value="ورود به درگاه پرداخت"/>
                                    </form>
                                </div>

                            @endif
                        @if (!$payment)



                            <div class="table-responsive" style="{{$token!=null ? "display:none":''}} ">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>تعداد پذیره (تعداد سهم )</th>
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
                                            <th>ارزش هر حق تقدم</th>
                                            <th>{{number_format(1000)}}ریال</th>
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
                                        @if ($account->current_stock>0)
                                            <tr>
                                                <th>پرداخت از طریق مطالبات</th>
                                                <th>

                                                    <div class="text-center">
                                                        <button class="btn btn-success" wire:click="OnlyWallet()">
                                                            پرداخت از طرق مطالبات
                                                            (
                                                            {{$account->current_stock}}
                                                            سهم
                                                            )
                                                        </button>
                                                    </div>

                                                </th>
                                            </tr>
                                        @endif
                                        @if($account->withdraw !=0)

                                            <tr>
                                                <th>پرداخت از طریق مطالبات و آورده نقدی</th>
                                                <th>
                                                    <divdiv class="text-center">
                                                        <button class="btn btn-success" wire:click="getToken()">
                                                            پرداخت از طریق مطالبات و اورده نقدی(
                                                            {{number_format($account->withdraw)}}
                                                            ریال
                                                            )
                                                        </button>
                                                    </divdiv>
                                                </th>
                                            </tr>
                                        @endif

                                    </table>
                                </div>
                                <div class="alert alert-info">
                                    <p>سهامدار محترم جهت دریافت برگه حق تقدم
                                        <a href="{{route('print')}}" target="_top"
                                           style="font-weight: bolder;text-decoration: underline ; ">
                                            بر روی
                                            این
                                            لینک کلیک کنید
                                        </a>

                                    </p>
                                </div>

                            </div>
                        @endif
                        <div style="{{$token!=null ? "display:none":''}} ">
                            @if ($payment&&$payment->local_pay!==null)
                                <div class="table-responsive" style="{{$token!=null ? "display:none":''}} ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th>تعداد پذیره (تعداد سهم )</th>
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
                                                <th>ارزش هر حق تقدم</th>
                                                <th>{{number_format(1000)}}ریال</th>
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
                                            @if($account->withdraw !=0 && $payment->gateway_id==null )

                                                <tr>
                                                    <th>پرداخت از طریق مطالبات و آورده نقدی</th>
                                                    <th>
                                                        <divdiv class="text-center">
                                                            <button class="btn btn-success" wire:click="getSecondToken()">
                                                                پرداخت از طریق مطالبات و اورده نقدی(
                                                                {{number_format($account->withdraw)}}
                                                                ریال
                                                                )
                                                            </button>
                                                        </divdiv>
                                                    </th>
                                                </tr>
                                            @endif
                                        </table>
                                    </div>

                                </div>

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
                                <div class="table-responsive" style="{{$token!=null ? "display:none":''}} ">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>نوع پرداخت</th>
                                                <th> تاریخ و ساعت پرداخت</th>
                                                <th>مبلغ پرداختی با مطالبات(ریال)</th>
                                                <th>مبلغ پرداختی نقدی(ریال)</th>
                                                <th>شناسه ارجاع درگاه پرداخت(درصورت پرداخت اینترنتی)</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>
                                                    @if ($payment->gateway_id===null&&$payment->local_pay!==null)
                                                        پرداخت از طریق مطالبات
                                                    @else
                                                        پرداخت از طریق مطالبات و نقدی
                                                    @endif
                                                </td>
                                                <td>{{\Morilog\Jalali\Jalalian::fromCarbon(new Carbon\Carbon($payment->created_at))->format('Y/m/d H:i')}}</td>

                                                <td>
                                                    {{number_format($payment->local_pay)}}
                                                </td>
                                                <td>
                                                    @if($payment->gateway_id!=null)
                                                        {{number_format(\App\Models\Gateway::whereId($payment->gateway_id)->first()->gateway_amount)}}
                                                    @endif

                                                </td>
                                                <td>
                                                    @if($payment->gateway_id!=null)

                                                        {{\App\Models\Gateway::whereId($payment->gateway_id)->first()->systemTraceAuditNumber}}
                                                    @endif

                                                </td>
                                            </tr>

                                            </tbody>

                                        </table>
                                    </div>

                                </div>

                        </div>
                        <hr>

                        <div class="alert alert-info">
                            <p>سهامدار محترم جهت دریافت رسید خرید حق تقدم خود
                                <a href="{{route('print-resid')}}" target="_top"
                                   style="font-weight: bolder;text-decoration: underline ; ">
                                    بر روی
                                    این
                                    لینک کلیک کید
                                </a>

                            </p>
                        </div>
                        @elseif(!$payment &&$account->sign_up==0)
                            <br>
                            <div class="text-center" style="color:black;">
                                سهامدار گرامی، جناب آقای / سرکار خانم:
                                <span class="badge badge-info">
                            {{$account->first_name . " " .$account->last_name}}
                            </span>
                                <span style="color: black">

                                    در صورت تمایل به انصراف از حق تقدم خود، بر روی دکمه زیر کلیک نموده و پس از آن شماره
                                    شبای خود را جهت دریافت مطالبات وارد نمایید:
                                                                      </span>

                                <br>
                                <br>

                                <div class="text-center ">
                                    <div style="display: flex;align-content: center;align-items: center">
                                        <input style="width: 40%;margin: 0 auto;min-width: 104px"
                                               class="form-control  @error('shaba') has-error @enderror "
                                               wire:model.lazy="shaba" placeholder="شماره شبا">
                                    </div>
                                    <div>
                                        <button class="btn btn-danger" wire:click="cancelMe">
                                            انصراف از حق تقدم
                                        </button>

                                    </div>
                                </div>
                                @error('shaba')
                                <span class="text-danger">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        @elseif($payment&&$payment->local_pay==null&&$payment->gateway_id==null)
                            جناب آقای / سرکار خانم:
                            <span class="badge badge-info">
                            {{$account->first_name . " " .$account->last_name}}
                            </span>
                            شما از حق تقدم خود انصراف داده اید !
                        @endif
                        @if(!$payment)
                            <br>
                            <p style="color: black;line-height: 30px">
                                * سهامدار گرامی، با توجه به محدودیت مبلغ پرداختی در درگاه های بانکی کشور، چنانچه
                                مبلغ پرداختی شما بیشتر از 50 میلیون تومان است، خواهشمند است مبلغ مورد نظر را به صورت
                                حضوری در بانک به حساب شمارۀ 321513393 اين شرکت نزد بانک رفاه کارگران شعبه آزادی کد
                                شعبه 1380 یا شماره شبای IR72-0130-1000-0000-0321-5133-93 واریز و مدارک آن را به آدرس
                                «استان خراسان جنوبی- بیرجند -صندوق پستی 878-97135 امور سهامداران شرکت کوير تاير»
                                ارسال فرمایید.

                                <br>
                                هشدار: سهامدار گرامی، پس از ثبت اطلاعات و انتخاب نحوه پرداخت، امکان تغییر در آن وجود
                                ندارد. خواهشمند است در خصوص انتخاب نحوه پرداخت و سایر موارد دقت فرمایید.
                            </p>
                        @endif
                            @if ($account->sign_up==0)
                                <div class="alert alert-primary">
                                    سهامدار محترم، در صورتی‌که حق تقدم عرضه شده در شرکت بورس اوراق بهادار تهران را خریداری نموده‌اید، جهت پرداخت مبلغ افزایش سرمایه،
                                    <a href="{{route('user.report')}}">
                                        این لینک کلیک کنید
                                    </a>
                                </div>
                            @endif

                    </div>
                </div>
            </div>

    </section>
</div>
<script>


    ConvertNumberToPersion();


    function ConvertNumberToPersion() {
        persian = {0: '۰', 1: '۱', 2: '۲', 3: '۳', 4: '۴', 5: '۵', 6: '۶', 7: '۷', 8: '۸', 9: '۹'};

        function traverse(el) {
            if (el.nodeType == 3) {
                var list = el.data.match(/[0-9]/g);
                if (list != null && list.length != 0) {
                    for (var i = 0; i < list.length; i++)
                        el.data = el.data.replace(list[i], persian[list[i]]);
                }
            }
            for (var i = 0; i < el.childNodes.length; i++) {
                traverse(el.childNodes[i]);
            }
        }

        traverse(document.body);
    }
</script>
</div>
