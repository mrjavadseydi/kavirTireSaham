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

        #lanatbkavirtire > tbody > tr > td {
            padding-bottom: 5px;
            padding-top: 5px;
        }
    </style>
    <title>گواهینامه حق تقدم </title>
</head>
<body style="background-color: rgba(245,245,245,0.73)">
<div class="text-center">
    <a type="button" class="" style="color: #fff; background-color: #0b94ea" id="" onclick="window.print();
        ">برای پرینت کلیک کنید</a>
    <a type="button" style="color: #fff; background-color: #ea0b0b"
       onclick="window.location.href = './?error=0';">خروج</a>
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
        <br>
        <div class="row">
            <div class="col-md-4">
                <p>

                    شماره گواهینامه :
                    {{convertNumbers($account['certificate'])}}

                </p>

            </div>
            <div class="col-md-4 ">
                <p style="font-weight: bold;" class="text-center">
                    گواهینامه حق تقدم خرید سهام
                </p>
            </div>
            <div class="col-md-4 ">
                <P class="float-left">
                    تاریخ گواهینامه:
                    {{--                    1400/08/26--}}
                    ۱۴۰۰/۰۸/۲۶
                    <!--                   15/02/1399-->
                </P>

            </div>
        </div>
        <br>
        <table>
            <tr style="width: 100%">
                <th style="width: 520px;">
                    <P>
                        شماره ثبت :
                        ۶۹۳۰۰

                    </P>
                    <P>سرمایه ثبت شده:
                        ۲،۱۸۰،۰۰۰،۰۰۰،۰۰۰
                    </P>
                </th>
                <th style="width:1100px;">
                    <p>
                        نشانی :استان خراسان جنوبی ، کیلومتر ۱۱ جاده کرمان صندوق پستی:
                        ۸۷۸
                        -
                        ۹۷۱۳۵
                    </p>
                    <p>
                        تلفن :

                        <span style="margin-left: 30px">
                            ۴۱۳۵۳۰۰۰ -۰۲۱  - داخلی ۵
{{--                            <br>--}}
                            {{--                            ۰۲۱-۴۱۳۵۳۰۳۰--}}
                    </span>
                        کد پستی:
                        ۷۴۱۵۹
                        -
                        ۹۷۱۳۶
                    </p>
                    <p style="margin-right: 40px">

                        ۴۱۳۵۳۰۳۰
                        -
                        ۰۲۱
                    </p>
                </th>
            </tr>
        </table>
        </BR>
        <div class="row" style="text-align: justify">
            <div class="col-md-4">
                <P style="text-align: justify">
                    نام و نام خانوادگی :
                    {{ $account['first_name']." ".$account['last_name']}}

                </P>
            </div>
            <div class="col-md-4">
                <p style="text-align: justify">
                    نام پدر:

                    {{$account['father']}}

                </p>
            </div>
            <div class="col-md-4">
                <P style="text-align: justify">
                    شماره شناسنامه:


                    {{convertNumbers($account['certificate_id'])}}

                </P>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <P style="text-align: justify">
                    کد سهامدار :

                    {{convertNumbers($account['stock_number'].$account['stock_alpha'])}}

                </P>
            </div>
            <div class="col-md-4">
                <p style="text-align: justify">
                    کد ملی:

                    {{convertNumbers($account['national_id'])}}

                </p>
            </div>
            <div class="col-md-4">
                <P style="text-align: justify">


                </P>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <P style="text-align: justify    padding-right: 100px;">
                    نشانی سهامدار :
                    {{$account['address']}}
                </P>
            </div>
            <div class="col-md-4">
                <P class=" text-center">



                </P>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <P style="text-align: justify">
                    کدپستی :
                    {{convertNumbers($account['post_code'])}}

                </P>
            </div>
            <div class="col-md-4">
                <p class=" text-center">

                </p>
            </div>
            <div class="col-md-4">
                <P class=" text-center">


                </P>
            </div>
        </div>
        <hr>
        <div>
            <p>سهامدار محترم :</p>
            <P>
                پیرو مصوبات مجمع عمومی فوق العاده مورخ ۱۴۰۰/۰۷/۲۸ و جلسه هیئت مدیره مورخ ۱۴۰۰/۰۴/۱۳ مقرر گردیده است
                ،
                سرمایه شرکت از مبلغ ۲،۱۸۰ میلیارد ریال به مبلغ ۴،۳۶۰ میلیارد ریال از محل مطالبات حال شده و آورده نقدی
                سهامداران افزایش یابد .
            </P>
        </div>
        <div>
            <table style="width:100%; font-weight: bold;font-size:14px " id="lanatbkavirtire">
                <tbody>
                <tr>
                    <td style="width: 559px; ">
                        <div class="d-flex">

                            ۱- تعداد سهام فعلی :
                            <div class="text-center" style="margin: 0 auto">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                {{convertNumbers($account['all_stock'])}}

                            </div>
                            <div class="text-left">
                                سهم
                            </div>
                        </div>

                    </td>
                    <td style="width: 482px; ">
                        <div class="d-flex">
                            ۸- مبلغ سرمایه فعلی :
                            <div class="text-center" style="margin: 0 auto">

                                ۲،۱۸۰،۰۰۰،۰۰۰،۰۰۰
                            </div>
                            <div class="text-left">
                                ریال
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 559px; ">
                        <div class="d-flex">
                            ۲- تعداد سهام قابل خرید :
                            <div class="text-center" style="margin: 0 auto">

                                {{convertNumbers($account['all_stock'])}}
                            </div>
                            <div class="text-left">
                                سهم
                            </div>
                        </div>

                    </td>
                    <td style="width: 482px; ">
                        <div class="d-flex">
                            ۹-مبلغ افزایش سرمایه :
                            <div class="text-center" style="margin: 0 auto">

                                ۲،۱۸۰،۰۰۰،۰۰۰،۰۰۰
                            </div>
                            <div class="text-left">
                                ریال
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 559px; ">
                        <div class="d-flex">

                            ۳-نوع سهام :
                            <div class="text-center" style="margin: 0 auto">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;عادی
                            </div>
                        </div>
                    </td>
                    <td style="width: 482px; ">
                        <div class="d-flex">
                            ۱۰- درصد افزایش سرمایه :
                            <div class="text-center" style="margin: 0 auto">
                                ۱۰۰٪
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 559px; ">
                        <div class="d-flex">
                            ۴- ارزش اسمی هر سهم :
                            <div class="text-center" style="margin: 0 auto">
                                ۱۰۰۰
                            </div>
                            <div class="text-left">
                                ریال
                            </div>
                        </div>
                    </td>
                    <td style="width: 482px; ">
                        ۱۱- مهلت استفاده :
                        از تاریخ ۱۴۰۰/۰۸/۲۶ تا تاریخ ۱۴۰۰/۱۰/۲۵
                    </td>
                </tr>
                <tr>
                    <td style="width: 559px; ">
                        <div class="d-flex">

                            ۵-مبلغ سهام قابل خرید :
                            <div class="text-center" style="margin: 0 auto">

                                {{convertNumbers(number_format($account['total']))}}
                            </div>
                            <div class="text-left">
                                ریال
                            </div>
                        </div>
                    </td>
                    <td style="width: 482px;border-bottom: 0 ">
                        ۱۲- نحوه واریز وجوه سهام جدید :
                    </td>
                </tr>
                <tr>
                    <td style="width: 559px; ">
                        <div class="d-flex">

                            ۶- از محل مطالبات حال شده :
                            <div class="text-center" style="margin: 0 auto">

                                {{convertNumbers(number_format($account->wallet))}}
                            </div>
                            <div class="text-left">
                                ریال
                            </div>
                        </div>
                    </td>
                    <td style="width: 482px; border-bottom: 0;border-top:0 ">
                        واریز مبلغ مندرج در بند (۷) و با لحاظ کد ملی برای اشخاص حقیقی
                        و شناسه ملی برای
                    </td>
                </tr>
                <tr>
                    <td style="width: 559px; ">
                        <div class="d-flex">

                            ۷- مبلغ واریزی نقدی :
                            <div class="text-center" style="margin: 0 auto">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                {{convertNumbers(number_format($account['withdraw']))}}
                            </div>
                            <div class="text-left">
                                ریال
                            </div>
                        </div>
                    </td>
                    <td style="width: 482px; border-top:0;font-size: 13.5px ">اشخاص حقوقی به حساب شماره۳۲۱۵۱۳۳۹۳ بانک
                        رفاه کارگران شعبه۱۳۸۰ آزادی بیرجند
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <p>
                الف- مبلغ مندرج شده در ردیف (۷) باید ظرف مهلت مقرر در ردیف (۱۱) به حساب بانکی مندرج در ردیف (۱۲) به نام
                شرکت
                کویر تایر (سهامی عام) واریز و اصل فیش واریزی به همراه اصل گواهینامه ظرف مهلت قانونی مندرج در بند(۱۱) به
                نشانی : استان خراسان جنوبی - شهرستان بیرجند - صندوق پستی ۸۷۸
                -
                ۹۷۱۳۵
                امور سهام شرکت کویر تایر ارسال گردد
            </p>
            <br>
            <p style="font-weight: bold">
                <span style="font-weight: bold">تذکر ۱:</span> کد شناسه واریز مختص هر سهامدار می باشد لذا در صورت واریز
                وجه افزایش سرمایه با شناسه/کد ملی سهامدار دیگر ،مسئولیت در نظر نگرفتن مبلغ واریز شده در افزایش سرمایه به عهده شخص
                سهامدار خواهد بود.
            </p>
            <br>
            <p style="font-weight: bold">
                <span style="font-weight: bold">تذکر ۲:</span> در صورت عدم ارسال اصل فیش واریزی سهامدار تا پایان وقت
                اداری ۱۴۰۰/۱۰/۲۵ مسئولیت در نظر نگرفتن مبلغ واریز شده در افزایش سرمایه به عهده شخص سهامدار خواهد بود .
            </p>
            <br>
            <p>
                ب- دارنده این گواهینامه طی مهلت مقرر در ردیف (۱۱) می تواند تمام و یا قسمتی از حق تقدم خود را منحصرا از طریق
                شرکت بورس اوراق بهادار تهران واگذار نماید .
                بدیهی است چنانچه از این گواهینامه در مهلت مندرج در ردیف (۱۱) توسط دارنده آن و یا شخصی که تمام یا قسمتی
                از حق تقدم مندرج در ردیف (۲) به وی واگذاری شده است استفاده نگردد هیچ حقی نسبت به سهام قابل خرید مذکور
                نخواهد داشت و سهام پذیره نویسی نشده از طریق شرکت بورس اوراق بهادار تهران به عموم عرضه و مبلغ حاصل شده پس
                از
                کسر هزینه های مربوطه به حساب ذینفع منظور خواهد شد .
            </P>
            <br>
            <P>
                ج- کسانی که قسمتی از حق تقدم خود را از طریق شرکت بورس اوراق بهادار واگذار نموده و تصمیم به استفاده از
                مابقی حق تقدم را دارند الزامی است که اصل این گواهینامه را به کارگزار مربوطه تحویل و کپی آن را به
                همراه فیش واریزی بابت واریز مابقی حق تقدم در مهلت قانونی مندرج در ردیف (۱۱) به آدرس مندرج در بند (الف)
                ارسال نمایند .
            </P>
        </div>
    </div>
</div>
<!---page 2--->
<br>
<br>
<br>
<br>

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
        <div class=" ">
            <br>
            <P style="font-weight: bold" class="text-justify">
                فرم شماره (۱) مخصوص تامین وجه افزایش سرمایه از محل مطالبات حال شده سهامداران:
            </P>
            <br>
        </div>
        <div class="box text-justify">
            <br>
            با امضاء ذیل این برگه به آن شرکت وکالت داده می شود مبلغ
            {{convertNumbers(number_format($account->wallet))}}
            ریال از محل مطالبات حال شده (مندرج در ردیف ۶ گواهینامه) برداشت نموده و اوراق سهام مربوطه را به نام اینجانب /
            این شرکت
            صادر نمایند
            <br>

            <div class="row">
                <div class="col-md-4">
                    <P class="text-justify">
                        نام و نام خانوادگی :
                        {{$account->first_name." ".$account->last_name}}
                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-justify">

                    </p>
                </div>
                <div class="col-md-4">
                    <P class=" text-justify">
                        محل صدور :
                        {{$account['export']}}

                    </P>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <P class="text-justify">
                        آدرس :
                        {{convertNumbers($account->address)}}

                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-justify">
                        شماره شناسنامه/ثبت:
                        {{convertNumbers($account->certificate_id)}}
                    </p>
                </div>
                <div class="col-md-4">
                    <P class="text-justify">
                        تلفن :
                        {{convertNumbers($account->phone)}}

                    </P>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <P class="text-justify">

                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-justify">

                    </p>
                </div>
                <div class="col-md-4">
                    <P class="text-justify">
                        تاریخ :&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;/۱۴۰۰


                    </P>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <P class="text-center">

                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-center">

                    </p>
                </div>
                <div class="col-md-4">
                    <P class=" text-justify">

                        مهر و امضا :

                    </P>
                </div>
            </div>
        </div>
        <div class=" ">
            <br>
            <P style="font-weight: bold" class="text-justify">
                فرم شماره (۲) مخصوص تامین وجه افزایش سرمایه از محل مطالبات حال شده و واریز نقدی توسط سهامداران:
            </P>
            <br>
        </div>
        <div class="box text-justify">
            <br>
            ضمن واریز .......................ریال (مندرج در ردیف ۷ گواهینامه) طی فیش بانکی با کد شناسه
            ..................... مورخ :&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;/۱۴۰۰ به حساب بانکی (مندرج در ردیف ۱۲
            گواهینامه ) بابت بهای اسمی تعداد ................ سهم قابل خرید (مندرج در ردیف ۲ گواهینامه ) به آن شرکت
            اجازه
            داده می شود مبلغ ................ ریال از محل مطالبات (مندرج در ردیف ۶ گواهینامه ) برداشت نموده و اوراق سهام
            را به نام اینجانب / این شرکت صادر نمایند . (اصل فیش پیوست می باشد .)
            <br>

            <div class="row">
                <div class="col-md-4">
                    <P class="text-justify">
                        نام و نام خانوادگی :
                        {{$account->first_name." ".$account->last_name}}

                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-justify">
                        شماره شناسنامه/ثبت:
                        {{convertNumbers($account->certificate_id)}}

                    </p>
                </div>
                <div class="col-md-4">
                    <P class=" text-justify">
                        محل صدور :
                        {{$account['export']}}


                    </P>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <P class="text-justify">
                        آدرس :
                        {{convertNumbers($account->address)}}

                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-center">

                    </p>
                </div>
                <div class="col-md-4">
                    <P class="text-justify">
                        تلفن :
                        {{convertNumbers($account->phone)}}


                    </P>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <P class="text-center">

                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-center">

                    </p>
                </div>
                <div class="col-md-4">
                    <P class="text-justify">
                        تاریخ :&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;/۱۴۰۰


                    </P>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <P class="text-center">

                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-center">

                    </p>
                </div>
                <div class="col-md-4">
                    <P class=" text-justify">

                        مهر و امضا :

                    </P>
                </div>
            </div>
        </div>
        <br>
        <p class="text-justify">
            سهامدار گرامی چنانچه تمایل به استفاده از حق تقدم تعلق گرفته را ندارید این قسمت را امضاء نمایید .
        </p>
        <div class="row">
            <div class="col-md-4">
                <P class="text-center">

                </P>
            </div>
            <div class="col-md-4">
                <p class=" text-center">

                </p>
            </div>
            <div class="col-md-4">
                <P class=" text-center">
                    امضاء


                </P>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <P class="text-center">

                </P>
            </div>
            <div class="col-md-4">
                <p class=" text-center">

                </p>
            </div>
            <div class="col-md-4">
                <P class=" text-center">
                    تاریخ :&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;/۱۴۰۰


                </P>
            </div>
        </div>
        <P>

        <span style="border-bottom: 1px solid #000">
            یادآوری های مهم :
        </span>
        </P>
        <UL>
            <LI class="text-justify">
                در صورت تمایل به استفاده از حق تقدم سهام جدید به نام خودتان و در حالتی که نیاز به واریز وجه (مبلغ مندرج
                در ردیف ۷ گواهینامه) باشد فرم شماره (۲) را تکمیل و به همراه فیش واریز وجه به نشانی مندرج در بند
                (الف) ارسال نمایید . کد شناسه واریز مختص هر سهامدار می باشد لذا در صورت واریز وجه افزایش سرمایه با
                شناسه سهامدار دیگر ، مسئولیت در نظر گرفتن مبلغ واریز شده در افزایش سرمایه به عهده شخص سهامدار خواهد بود .

            </LI>
        </UL>
        <br>
        <div class="row">
            <div class="col-md-4">
                <P class="text-center">
                    مدیر عامل:

                </P>
            </div>
            <div class="col-md-4">
                <p class=" text-center">

                </p>
            </div>
            <div class="col-md-4">
                <P class=" text-center">


                </P>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <P class="text-center">
                    سید محمد حسین زینلی

                </P>
                <img src="{{asset('img/m-zainali.png')}}"
                     style="    position: absolute;    height: 81px;    top: 7px;    left: 125px;    width: 100px;">
            </div>
            <div class="col-md-4">
                <p class=" text-center">
                    مهر شرکت
                </p>
                <img src="{{asset('img/Mohr.png')}}" style="position: absolute;    left: 59px;    top: 17px;">
            </div>
            <div class="col-md-4">
                <P class=" text-center">
                    عضو هیئت مدیره


                </P>
                <img src="{{asset('img/1201_.png')}}"
                     style="    width: 150px;    height: 117px;    top: -1px;    position: absolute;    left: 103px;">
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="box text-justify" style="font-size: 19px;margin-bottom: 25px;">
            <br>
            <p>
                توجه در صورت هر گونه مغایرت در اطلاعات مربوط به سهامدار با اطلاعات مندرج در گواهینامه حق تقدم ، موارد را
                با آدرس ایمیل saham@kavirtire.ir اعلام نموده و یا با شماره تلفن <span>
                    ۴۱۳۵۳۰۳۰
                     -
                     ۰۲۱
                     یا
                    ۴۱۳۵۳۰۰۰
                  - ۰۲۱
                    داخلی ۵
                </span>
                حاصل
                فرمایید.
            </p>
            <!--                <br>-->
        </div>

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
</body>
</html>
