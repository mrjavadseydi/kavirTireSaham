<div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">وضعیت حق تقدم </h2>

            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
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
                                    <th>{{number_format($account->wallet)}}</th>
                                </tr>

                                <tr>
                                    <th>واریز نقدی</th>
                                    <th>{{number_format($account->withdraw)}}</th>
                                </tr>

                                <tr>
                                    <th>مجموع</th>
                                    <th>{{number_format($account->total)}}</th>
                                </tr>
                            </table>
                        </div>
                        @if ($payment)

                            با عنایت به مجوز افزایش سرمایه به شماره DPM-IOP-00A-120 مورخ 1400/07/12 سازمان بورس و پیرو
                            مصوبات مجمع فوق‌العاده مورخ 1400/07/28،
                            بدینوسیله تایید می‌گردد مبلغ{{number_format($account->total)}}
                            ریال ،
                            توسط آقا/خانم {{$account->first_name . " " .$account->last_name}}
                            با کد ملی{{$account->national_id}}
                            و کد بورسی
                            {{$account->stock_number.$account->stock_alpha}}
                            بابت خرید حق تقدم پرداخت گردید.
                            شرکت کویرتایر
                        @else
                            جناب آقای / سرکار خانم:
                            <span class="badge badge-info">
                            {{$account->first_name . " " .$account->last_name}}
                            </span>
                            برای پرداخت هزینه حق تقدم خود به مبلغ
                            <span class="badge badge-warning">

                            {{number_format($account->withdraw)}}
                            </span>
                            ریال  بر روی لینک زیر کلیک کنید .
                            <br>
                            مجموع پرداختی شما
                            <span class="badge badge-info">

                            {{number_format($account->total)}}
                            </span>
                            ریال میباشد که مبلغ
                            <span class="badge badge-danger">

                            {{number_format($account->wallet)}}
                            </span>
                            ریال ان از محل مطالبات شما پرداخت خواهد شد .

                        @endif


                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
