<!DOCTYPE html>
<html lang="fa">
<head>
    <title>سامانه امور سهامداران شرکت کویر تایر</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('loginAsset/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginAsset/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('loginAsset/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('loginAsset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginAsset/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginAsset/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginAsset/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginAsset/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginAsset/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginAsset/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('loginAsset/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <!--===============================================================================================-->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />

    <style>
        * {
            font-family: Vazir !important;
        }
        .select{
            height: 97%;
            border-radius: 5px;
            width: 100%;
        }
        .wrap{
            height: 9vh;
            margin: 5px;
        }
    </style>
    @livewireStyles

</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            {{$slot}}
            <div class="login100-more" style="background-image: url('{{asset('New Project.jpg')}}');">
            </div>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="{{asset('loginAsset/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginAsset/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginAsset/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('loginAsset/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginAsset/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginAsset/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('loginAsset/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginAsset/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('loginAsset/js/main.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@livewireScripts
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="41053082-1182-4759-9d82-3ea5cab76696";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>
</html>
