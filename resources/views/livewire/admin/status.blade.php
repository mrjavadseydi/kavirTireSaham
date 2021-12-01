<div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="r4_counter db_box">
                <i class="pull-left fa fa-user icon-md icon-rounded icon-primary"></i>
                <div class="stats">
                    <h4><strong>{{$alluser}}</strong></h4>
                    <span>تمامی کاربران</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="r4_counter db_box">
                <i class="pull-left fa fa-user icon-md icon-rounded icon-orange"></i>
                <div class="stats">
                    <h4><strong>{{$loged_in}}</strong></h4>
                    <span> کاربران وارد شده</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="r4_counter db_box">
                <i class="pull-left fa fa-dollar icon-md icon-rounded icon-purple"></i>
                <div class="stats">
                    <h4><strong>{{number_format($total_gateway)}} ریال </strong></h4>
                    <span>پرداخت درگاه</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="r4_counter db_box">
                <i class="pull-left fa fa-users icon-md icon-rounded icon-warning"></i>
                <div class="stats">
                    <h4><strong>{{number_format($local_pay)}} ریال </strong></h4>
                    <span>پرداخت از مطالبات</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="r4_counter db_box">
                <i class="pull-left fa fa-remove icon-md icon-rounded icon-danger"></i>
                <div class="stats">
                    <h4><strong>{{$canceled}}</strong></h4>
                    <span>انصراف از حق تقدم </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="r4_counter db_box">
                <i class="pull-left fa fa-user icon-md icon-rounded icon-secondary"></i>
                <div class="stats">
                    <h4><strong>{{$today_login}}</strong></h4>
                    <span>ورودی امروز</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="r4_counter db_box">
                <i class="pull-left fa fa-dollar icon-md icon-rounded icon-info"></i>
                <div class="stats">
                    <h4><strong>{{number_format($today_gateway)}} ریال </strong></h4>
                    <span>پرداختی امروز درگاه</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="r4_counter db_box">
                <i class="pull-left fa fa-users icon-md icon-rounded icon-primary"></i>
                <div class="stats">
                    <h4><strong>{{number_format($today_local)}} ریال </strong></h4>
                    <span>پرداخت از مطالبات امروز</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
        </div>

            <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="r4_counter db_box">
                <i class="pull-left fa fa-remove icon-md icon-rounded icon-success"></i>
                <div class="stats">
                    <h4><strong>{{$sings_up}}</strong></h4>
                    <span>کاربران ثبت نام دستی</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="r4_counter db_box">
                <i class="pull-left fa fa-shopping-cart icon-md icon-rounded icon-orange"></i>
                <div class="stats">
                    <h4><strong>{{$today_sings_up}}</strong></h4>
                    <span>ورودی کاربران ثبت نام دستی امروز</span>
                </div>
            </div>
        </div>

    </div>

</div>
