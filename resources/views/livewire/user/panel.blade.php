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
                                <form action="https://ikc.shaparak.ir/iuiv3/IPG/Index/" method="POST"
                                      class="text-center">
                                    <input type="hidden" name="tokenIdentity" value="{{$token}}"/>
                                    <input type="submit" class="btn btn-info" value="ورود به درگاه پرداخت"/>
                                </form>
                            @endif

                            <div class="table-responsive" style="{{$token!=null ? "display:none":''}} ">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>تعداد پذیره (سهم)</th>
                                        <th>پرداختی به ازای هر پذیره</th>
                                        <th>جمع کل</th>
                                        <th>مبلغ مطالبات شما</th>
                                        <th>پرداخت از طریق مطالبات</th>
                                        <th>پرداخت از طریق مطالبات و آورده نقدی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>{{$account->all_stock}}</th>
                                        <th>1,000 ریال</th>
                                        <th>{{$account->total}}</th>
                                        <th>{{number_format($account->wallet)}} ریال</th>
                                        <th>
                                            @if ($account->current_stock>0)
                                                <div class="text-center">
                                                    <button class="btn btn-success" wire:click="OnlyWallet()">
                                                        پرداخت از طرق مطالبات
                                                        (
                                                        {{$account->current_stock}}
                                                        سهم
                                                        )
                                                    </button>
                                                </div>
                                            @endif

                                        </th>
                                        <th>
                                            @if($account->withdraw !=0)
                                                <div class="text-center">
                                                    <button class="btn btn-success" wire:click="getToken()">
                                                        پرداخت از طریق مطالبات و اورده نقدی(
                                                        {{number_format($account->withdraw)}}
                                                        ریال
                                                        )
                                                    </button>
                                                </div>
                                            @endif
                                        </th>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                        @endif
                        <div style="{{$token!=null ? "display:none":''}} ">
                            @if ($payment&&$payment->local_pay!=null)
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
                                جناب آقای / سرکار خانم:
                                <span class="badge badge-info">
                            {{$account->first_name . " " .$account->last_name}}
                            </span>
                                در صورت تمایل به انصراف از حق تقدم خود از دکمه زیر استفاده کنید
                                <br>
                                <br>
                                <div class="text-center">
                                    <button class="btn btn-danger" wire:click="cancelMe">
                                        انصراف از حق تقدم ( غیر قابل بازگشت )
                                    </button>
                                </div>
                            @elseif($payment&&$payment->local_pay==null)
                                جناب آقای / سرکار خانم:
                                <span class="badge badge-info">
                            {{$account->first_name . " " .$account->last_name}}
                            </span>
                                شما از حق تقدم خود انصراف داده اید !
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
