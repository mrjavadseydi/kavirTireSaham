<div style="display: inline-block">

    <div class="form-structor" style="margin: 5px;display: inline-block">
        <div class="signup">
            <h2 class="form-title" id="signup" wire:loading.remove>
                ثبت نام در سامانه

            </h2>
            <h2 wire:loading class="form-title" style="text-align: center">
                در حال بررسی
            </h2>
                <div class="form-holder" wire:>
                    @if($signup_step==1)
                        <input type="text" class="input"  wire:model.lazy="fname" placeholder="نام"/>
                        <input type="text" class="input"  wire:model.lazy="lname" placeholder="نام خانوادگی"/>
                        <input type="text" class="input"  wire:model.lazy="certificate" placeholder="کد سهامدار"/>
                        <input type="text" class="input"  wire:model.lazy="father" placeholder="نام پدر"/>
                        <input type="text" class="input"  wire:model.lazy="nat_id" placeholder="کد ملی"/>
                    @elseif($signup_step==2)
                        <input type="text" class="input" wire:model.lazy="phone" placeholder="تلفن ثابت"/>
                        <input type="text" class="input" wire:model.lazy="mobile" placeholder="موبایل"/>
                        <input type="text" class="input" wire:model.lazy="st_num" placeholder="بخش عددی کد بورسی"/>
                        <input type="text" class="input" wire:model.lazy="st_alp" placeholder="بخش حرفی کد بورسی"/>
                    @else
                        <input type="text" class="input" wire:model.lazy="stock_count" placeholder="تعداد سهام حق تقدم"/>
                        <input type="text" class="input" wire:model.lazy="cert_id" placeholder="شماره شناسنامه"/>
                        <input type="text" class="input" wire:model.lazy="address" placeholder="ادرس پستی"/>
                        <input type="text" class="input" wire:model.lazy="post_code" placeholder="کد پستی"/>
                    @endif
                </div>
                <button class="submit-btn" wire:click="signup">مرحله بعد</button>
                @if ($signup_step>1)
                    <button class="submit-btn" wire:click="beforeStep">مرحله قبل</button>
                @endif


        </div>

    </div>
    <div class="form-structor" style="margin: 5px;display: inline-block">
        <div class="signup">
            <h2 class="form-title" id="signup" wire:loading.remove>
                @if($step==0)
                    ورود به سامانه سهام شرکت کویرتایر

                @elseif ($step==1)
                    بخش حرفی کد بورسی خود را انتخاب کنید
                @elseif ($step==2)
                    نام خود را انتخاب کنید
                @elseif($step==3)
                    {{$msg}}
                @elseif($step==4)
                @endif


            </h2>
            <h2 wire:loading class="form-title" style="text-align: center">
                در حال بررسی
            </h2>
            <form wire:submit.prevent="login" wire:loading.remove>

                <div class="form-holder">
                    @if ($step==0)
                        <input type="number" class="input" placeholder="بخش عددی کد بورسی" wire:model.lazy="stock_number"/>

                    @elseif($step==1)
                        <select class="input select" wire:model="stock_alpha">
                            <option>انتخاب کنید</option>

                            @foreach($meta['stock_alpha'] as $meta)
                                <option>{{$meta}}</option>
                            @endforeach
                        </select>
                    @elseif ($step==2)
                        <select class="input select" wire:model="account_id">
                            <option>انتخاب کنید</option>

                            @foreach($meta['name'] as $meta)
                                <option value="{{$meta['id']}}">{{$meta['name']}}</option>
                            @endforeach
                        </select>

                    @elseif($step==3)
                        <select class="input select" wire:model="cert">
                            <option>انتخاب کنید</option>

                            @foreach($meta['step4'] as $meta)
                                <option>{{$meta}}</option>
                            @endforeach
                        </select>

                    @endif
                </div>
                <button class="submit-btn">{{$step==0?"ورود":"ادامه"}}</button>
            </form>

        </div>

    </div>



</div>
