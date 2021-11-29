<div>
    <style>
        .has-error {
            border-color: red;
        }

        tr {
            text-align: center;
        }

        th {
            text-align: center;
        }

        table {
            text-align: center;

        }
    </style>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">
                    {{$token==null?"خود اظهاری حق تقدم ":"ورود به درگاه پرداخت"}}
                </h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if ($token!=null)
                            <div class="text-center" style="text-align: center">
                                <div style="margin: 0 auto" class="text-center">
                                    <h4 class="text-center">
                                        مبلغ قابل پرداخت برای
                                        {{number_format($count*1000)}}
                                        ریال
                                        (تعداد
                                        {{$count}}
                                        سهم )
                                    </h4>
                                </div>

                                <img src="{{asset('logo-red.png')}}" class="img-responsive" style="margin: 0 auto"/>
                                <br>
                                <form action="https://ikc.shaparak.ir/iuiv3/IPG/Index/" method="POST"
                                      class="text-center">
                                    <input type="hidden" name="tokenIdentity" value="{{$token}}"/>
                                    <input type="submit" class="btn btn-lg btn-info " value="ورود به درگاه پرداخت"/>
                                </form>
                            </div>
                        @else
                            <p>
                                سهامدار محترم، در صورتی‌که حق تقدم عرضه شده در شرکت بورس اوراق بهادار تهران را خریداری نموده‌اید، لطفاً تعداد سهام حق تقدم خریداری شده را در کادر وارد نموده و پس از آن، بر روی «پرداخت» کلیک نمایید:
                            </p>
                            <div class="text-center ">


                                <div style="display: flex;align-content: center;align-items: center">
                                    <input style="width: 40%;margin: 0 auto;min-width: 104px"
                                           class="form-control  @error('shaba') has-error @enderror "
                                           wire:model="count" type="number" min="1" placeholder="تعداد حق تقدم">
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-success" value="تایید و پرداخت"
                                           wire:click="toGateWay">
                                    <div class="text-center">

                                        @if ($count>0)
                                            <h5>
                                                مبلغ قابل پرداخت :
                                                {{number_format($count*1000)}}
                                                ریال
                                            </h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (count($selfReport)>0 &&$token==null)
                            <p>
                                لیست خود اظهاری های شما
                            </p>
                            <div class="table-responsive" style="{{$token!=null ? "display:none":''}} ">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>تعداد</th>
                                            <th> مبلغ</th>
                                            <th>زمان</th>
                                            <th>کد رهگیری</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($selfReport as $self)
                                            <tr>
                                                <td>{{$self->count}}</td>
                                                <td>{{number_format($self->count*1000)}}
                                                    ریال
                                                </td>
                                                <td>{{\Morilog\Jalali\Jalalian::fromCarbon(new Carbon\Carbon($self->created_at))->format('Y/m/d H:i')}}</td>
                                                <td>{{\App\Models\Gateway::whereId($self->gateway_id)->first()->systemTraceAuditNumber}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>

                            </div>

                    </div>

                    @endif


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
