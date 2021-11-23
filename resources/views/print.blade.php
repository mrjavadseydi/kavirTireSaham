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
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
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
        <div class=" ">
            <br>
            <P style="font-weight: bold" class="text-justify">
                فرم شماره (۱) مخصوص تامین وجه افزایش سرمایه از محل مطالبات حال شده سهامداران
            </P>
            <br>
        </div>
        <div class="box text-justify">
            <br>
            اینجانب با امضا ذیل این برگه به آن شرکت وکالت داده میشود مبلغ ............. ریال از محل مطالبات حال شده
            مندرج در ردیف (۶) گواهینامه برداشت نموده و اوراق سهام مربوطه را به نام اینجانب / این شرکت صادر نمایند .


            <br>

            <div class="row">
                <div class="col-md-4">
                    <P class="text-center">
                        نام و نام خانوادگی :
                        {{$account->first_name." ".$account->last_name}}
                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-center">
                        شماره شناسنامه/ثبت:
                        {{convertNumbers($account->certificate_id)}}
                    </p>
                </div>
                <div class="col-md-4">
                    <P class=" text-center">
                        محل صدور :



                    </P>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <P class="text-center">
                        آدرس :
                        {{convertNumbers($account->address)}}

                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-center">
                        تلفن :
                        {{convertNumbers($account->phone)}}

                    </p>
                </div>
                <div class="col-md-4">
                    <P class=" text-center">


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

                        مهر و امضا :

                    </P>
                </div>
            </div>
        </div>
        <div class=" ">
            <br>
            <P style="font-weight: bold" class="text-justify">
                فرم شماره (۲) مخصوص تامین وجه افزایش سرمایه از محل مطالبات حال شده و واریز نقدی توسط سهامدار
            </P>
            <br>
        </div>
        <div class="box text-justify">
            <br>
            ضمن واریز .......................ریال (مندرج در ردیف ۷ گواهینامه ) طی فیش بانکی با کد شناسه
            ..................... مورخ تاریخ :&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;/۱۴۰۰ به حساب بانکی (مندرج در ردیف ۱۲
            گواهینامه ) بابت بهای اسمی تعداد ................ سهم قابل خرید (مندرج در ردیف ۲گواهینامه ) به آن شرکت اجازه
            داده میشود مبلغ ................ ریال از محل مطالبات (مندرج در ردیف ۶ گواهینامه ) برداشت نموده و اوراق سهام
            را به اینجانب / این شرکت صادر نمایید . (اصل فیش پیوست میباشد .)
            <br>

            <div class="row">
                <div class="col-md-4">
                    <P class="text-center">
                        نام و نام خانوادگی :
                        {{$account->first_name." ".$account->last_name}}

                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-center">
                        شماره شناسنامه/ثبت:
                        {{convertNumbers($account->certificate_id)}}

                    </p>
                </div>
                <div class="col-md-4">
                    <P class=" text-center">
                        محل صدور :


                    </P>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <P class="text-center">
                        آدرس :
                        {{convertNumbers($account->address)}}

                    </P>
                </div>
                <div class="col-md-4">
                    <p class=" text-center">
                        تلفن :
                        {{convertNumbers($account->phone)}}

                    </p>
                </div>
                <div class="col-md-4">
                    <P class=" text-center">
                        <!--                        محل صدور :-->


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
                در ردیف ۷ گواهینامه )باشد فرم شماره (۲) را تکمیل و به همراه فیش واریز وجه به نشانی مندرج در بند
                (الف)ارسال نمایید . کد / شناسه ملی واریز مختص هر سهامدار میباشد لذا در صورت واریز وجه افزایش سرمایه با
                شناسه سهامدار دیگر ،مسئولیت در نظر گرفتن مبلغ واریز شده در افزایش سرمایه به عهده سهامدار خواهد بود .

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
                با آدرس ایمیل saham@kavirtire.ir اعلام نموده و یا با شماره تلفن <span>۳۲۲۵۵۱۰۲- ۰۵۶</span> داخلی ۵ تماس حاصل
                فرمایید
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
