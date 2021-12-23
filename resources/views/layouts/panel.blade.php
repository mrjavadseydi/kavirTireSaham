<!DOCTYPE html>
<html class=" ">

<!-- Mirrored from www.mellatweb.ir/ultra-admin/tables-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:04:46 GMT -->
<head>
    <!--
     * @Package: Ultra Admin - Responsive Theme
     * @Subpackage: Bootstrap
     * @Version: 1.0
     * rtl by mellatweb.com
    -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>حق تقدم سهام شرکت کویر تایر</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link rel="icon" sizes="32x32" href="{{asset('favicon-32.png')}}" type="image/png"/>
    <link rel="icon" sizes="64x64" href="{{asset('favicon-64.png')}}" type="image/png"/>
    <link rel="icon" sizes="96x96" href="{{asset('favicon-96.png')}}" type="image/png"/>
    <!-- CORE CSS FRAMEWORK - START -->
    <link href="{{asset('assets/plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- CORE CSS TEMPLATE - START -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS TEMPLATE - END -->
    <style>
        .sidebarItem {
            display: flex !important;
            direction: rtl;
            align-items: center;
        }

        .page-topbar .logo-area {
            background-image: url("{{asset('logo.png')}}") !important;
            background: #32323aeb;
        }
    </style>
    @livewireStyles
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class=" "><!-- START TOPBAR -->
<div class='page-topbar '>

    <div class='quick-area'>

        <div class='pull-right'>
            <ul class="info-menu right-links list-inline list-unstyled">
                <li class="profile">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <span>{{session('account')->first_name. " ". session('account')->last_name}} <i
                                class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu profile animated fadeIn">
                        <li class="last">
                            <a href="{{route('logout')}}">
                                <i class="fa fa-lock"></i>
                                خروج
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>

</div>

<section class="page-container row-fluid">

    <section  class="">
        <section class="" style="margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;">

            {{$slot}}
        </section>
    </section>
</section>
</div>
</div>
<script src="{{asset('assets/js/jquery-1.11.2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery.easing.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/viewport/viewportchecker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/scripts.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/plugins/sparkline-chart/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/chart-sparkline.js')}}" type="text/javascript"></script>
@livewireScripts
    <script src="{{ asset('js/app.js') }}" defer></script>
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="41053082-1182-4759-9d82-3ea5cab76696";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>

</html>



