<?php

function convertNumbers($srting, $toPersian = true)
{
    $en_num = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $fa_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    if ($toPersian) return str_replace($en_num, $fa_num, $srting);
    else return str_replace($fa_num, $en_num, $srting);
}

?>
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <style>
        @media print {
            a {
                display: none;
            !important;
            }

            .btn {
                display: none;
            !important;
            }

            body {
                width: 100%;
            }
        }
    </style>
    <title>گواهینامه حق تقدم </title>
</head>
<body style="background-color: rgba(245,245,245,0.73)">
<div class="text-center">
    <a type="button" class="" style="color: #fff; background-color: #0b94ea" id="" onclick="window.print();
        ">برای پرینت کلیک کنید</a>

</div>
<div class="container-fluid" style="">


    <div class="row" style="padding-top:20px; ">
        <div class="col-md-6 float-right">
            <p style=" font-weight: bold;font-size: 21px;padding-top: 15px;">
                شرکت کویر تایر (سهامی عام )
            </p>
        </div>
        <div class="col-md-6 float-left">
            <img src="{{asset('img/logo-min2.png')}}" class="float-left" style="height: 53px;">
        </div>
    </div>
    <div style="border: 2px solid #54444469; border-radius:9px " class="p-2">
        <div class="text-center" style="display: flex;padding: 20px">
            <h5 style="margin:0 auto">
                بسمه تعالی
            </h5>
        </div>
        <span style="    line-height: 46px;">
            با عنایت به مجوز افزایش سرمایه به شماره DPM-IOP-00A-120 مورخ 1400/07/12 سازمان بورس
            و
            پیرو
            مصوبات مجمع فوق‌العاده مورخ 1400/07/28،
            بدینوسیله تایید می‌گردد
            مبلغ
            <span style="font-weight: bolder">
                                    {{$payment->gateway_id==null?number_format($account->current_stock*1000):number_format($account->total)}}
                                </span>
            ریال ،
            توسط
            <span style="font-weight: bold">
                        آقا/خانم {{$account->first_name . " " .$account->last_name}}
            </span>

            با
                        <span style="font-weight: bold">

            کد ملی      {{$account->national_id}}
                                        </span>

            و کد بورسی
            <span style="font-weight: bolder">
                                    {{$account->stock_number.$account->stock_alpha}}
                                </span>

            بابت خرید حق تقدم پرداخت گردید.
            <br>
                                            <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>نوع پرداخت</th>
                                                <th> تاریخ و ساعت پرداخت</th>
                                                <th>مبلغ پرداختی با مطالبات(ریال)</th>
                                                <th>مبلغ پرداختی نقدی(ریال)</th>
                                                <th>شناسه ارجاع درگاه پرداخت</th>
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

            <div class="text-center">
                لازم به ذکر است پس از تکمیل فرایند افزایش سرمایه ، حق تقدم به سهم تبدیل خواهد شد .
                <br>
                شرکت کویرتایر
                <br>
                <img src="{{asset('img/Mohr.png')}}">
                <br>
            </div>

        </span>

    </div>
    <br>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">

</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="./js/jquery.js">
</script>
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
</body>
</html>
