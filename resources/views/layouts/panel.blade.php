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
    <title>Ultra Admin : جداول داده</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon"/>    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">
    <!-- For iPad Retina display -->


    <!-- CORE CSS FRAMEWORK - START -->
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <link href="assets/plugins/datatables/css/jquery.data%d8%ac%d8%af%d8%a7%d9%88%d9%84.html" rel="stylesheet"
          type="text/css" media="screen"/>
    <link
        href="assets/plugins/datatables/extensions/TableTools/css/data%d8%ac%d8%af%d8%a7%d9%88%d9%84.tableTools.min.html"
        rel="stylesheet" type="text/css" media="screen"/>
    <link href="assets/plugins/datatables/extensions/Responsive/css/data%d8%ac%d8%af%d8%a7%d9%88%d9%84.responsive.html"
          rel="stylesheet" type="text/css" media="screen"/>
    <link
        href="assets/plugins/datatables/extensions/Responsive/bootstrap/3/data%d8%ac%d8%af%d8%a7%d9%88%d9%84.bootstrap.html"
        rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


    <!-- CORE CSS TEMPLATE - START -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <!-- CORE CSS TEMPLATE - END -->
    <style>
        .sidebarItem {
            display: flex !important;
            direction: rtl;
            align-items: center;
        }
        .page-topbar .logo-area{
            background-image: url("{{asset('logo.png')}}") !important;
            background: #32323aeb;
        }
    </style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class=" "><!-- START TOPBAR -->
<div class='page-topbar '>
    <div class="logo-area">

    </div>
    <div class='quick-area'>
        <div class='pull-left'>
            <ul class="info-menu left-links list-inline list-unstyled">
                <li class="sidebar-toggle-wrap">
                    <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>


            </ul>
        </div>
        <div class='pull-right'>
            <ul class="info-menu right-links list-inline list-unstyled">
                <li class="profile">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <span>{{session('account')->first_name. " ". session('account')->last_name}} <i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu profile animated fadeIn">
                        <li class="last">
                            <a href="ui-login.html">
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
<!-- END TOPBAR -->
<!-- START CONTAINER -->
<div class="page-container row-fluid">

    <!-- SIDEBAR - START -->
    <div class="page-sidebar ">


        <!-- MAIN MENU - START -->
        <div class="page-sidebar-wrapper" id="main-menu-wrapper">

            <!-- USER INFO - START -->

            <!-- USER INFO - END -->


            <ul class='wraplist'>


                <li class="">
                    <a href="index-2.html" class="sidebarItem">

                        <i class="fa fa-dashboard"></i>


                        <span class="title">داشبورد</span>
                    </a>
                </li>


            </ul>

        </div>
        <!-- MAIN MENU - END -->


    </div>


    <div class="chatapi-windows ">


    </div>
</div>
<!-- END CONTAINER -->
<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


<!-- CORE JS FRAMEWORK - START -->
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>
<!-- CORE JS FRAMEWORK - END -->


<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
<script src="assets/plugins/datatables/js/jquery.data%d8%ac%d8%af%d8%a7%d9%88%d9%84.min.html"
        type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/TableTools/js/data%d8%ac%d8%af%d8%a7%d9%88%d9%84.tableTools.min.html"
        type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/Responsive/js/data%d8%ac%d8%af%d8%a7%d9%88%d9%84.responsive.min.html"
        type="text/javascript"></script>
<script
    src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/data%d8%ac%d8%af%d8%a7%d9%88%d9%84.bootstrap-2.html"
    type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


<!-- CORE TEMPLATE JS - START -->
<script src="assets/js/scripts.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS - END -->

<!-- Sidebar Graph - START -->
<script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
<!-- Sidebar Graph - END -->


<!-- modal end -->
</body>

<!-- Mirrored from www.mellatweb.ir/ultra-admin/tables-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 06:04:51 GMT -->
</html>



