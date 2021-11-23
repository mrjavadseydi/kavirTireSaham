<div>
    <style>
        .has-error {
            border-color: red;
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

                        @if (!$payment)
                            <div class="alert alert-info">
                                <p>سهامدار محترم جهت دریافت برگه حق تقدم و پرداخت از طریق بانک
                                    <a href="{{route('print')}}" target="_top" style="font-weight: bolder;text-decoration: underline ; ">
                                        بر روی
                                        این
                                        لینک کلیک کید
                                    </a>

                                </p>
                            </div>
                            @if ($token!=null)
                                <div class="text-center" style="text-align: center">

                                    <img src="{{asset('logo-red.png')}}" class="img-responsive" style="margin: 0 auto"/>
                                    <br>
                                    <form action="https://ikc.shaparak.ir/iuiv3/IPG/Index/" method="POST"
                                          class="text-center">
                                        <input type="hidden" name="tokenIdentity" value="{{$token}}"/>
                                        <input type="submit" class="btn btn-lg btn-info " value="ورود به درگاه پرداخت"/>
                                    </form>
                                </div>

                            @endif

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
                                                    <div class="text-center">
                                                        <button class="btn btn-success" wire:click="getToken()">
                                                            پرداخت از طریق مطالبات و اورده نقدی(
                                                            {{number_format($account->withdraw)}}
                                                            ریال
                                                            )
                                                        </button>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endif

                                    </table>
                                </div>

                            </div>
                        @endif
                        <div style="{{$token!=null ? "display:none":''}} ">
                            @if ($payment&&$payment->local_pay!==null)
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
                            @elseif(!$payment)
                                <br>
                                <div class="text-center">
                                    سهامدار گرامی، جناب آقای / سرکار خانم:
                                    <span class="badge badge-info">
                            {{$account->first_name . " " .$account->last_name}}
                            </span>
                                    در صورت تمایل به انصراف از حق تقدم خود، بر روی دکمه زیر کلیک نموده و پس از آن شماره
                                    شبای خود را جهت دریافت مطالبات وارد نمایید:
                                    <br>
                                    <br>

                                    <div class="text-center ">
                                        <div style="display: flex;align-content: center;align-items: center">
                                            <input style="width: 50%;margin: 0 auto;min-width: 154px"
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
                        </div>
                        <a referrerpolicy="origin" target="_blank"
                           href="https://trustseal.enamad.ir/?id=42368&amp;Code=HniMumvVIDTOpxNglEor"><img
                                referrerpolicy="origin"
                                src="https://Trustseal.eNamad.ir/logo.aspx?id=42368&amp;Code=HniMumvVIDTOpxNglEor"
                                alt="" style="cursor:pointer" id="HniMumvVIDTOpxNglEor"></a>

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
