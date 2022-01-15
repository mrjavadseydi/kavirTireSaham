<div>

    <div class="login100-form validate-form">
        <div >
            <span class="login100-form-title p-b-43">
						                @if($step==0)
                    ورود به سامانه سهام شرکت کویرتایر

                @elseif ($step==1)
                    بخش حرفی کد بورسی خود را انتخاب کنید
                @elseif ($step==2)
                    نام خود را انتخاب کنید
                @elseif($step==3)
                    {{$msg}}
                @elseif($step==4)
                    لطفا اطلاعات خود را تکمیل کنید
                @endif
					</span>
            @if ($step==0)

                <div class="wrap-input100 validate-input" data-validate="">
                    <input class="input100" type="text" wire:model.lazy="stock_number">
                    <span class="focus-input100"></span>
                    <span class="label-input100">بخش عددی کد بورسی</span>
                </div>
            @elseif($step==1)
                <div class="wrap" data-validate="">
                    <select class="input select" wire:model="stock_alpha">
                        <option>انتخاب کنید</option>
                        @foreach($meta['stock_alpha'] as $meta)
                            <option>{{$meta}}</option>
                        @endforeach
                    </select>
                </div>

            @elseif ($step==2)
                <div class="wrap" data-validate="">

                    <select class="input select" wire:model="account_id">
                        <option>انتخاب کنید</option>

                        @foreach($meta['name'] as $meta)
                            <option value="{{$meta['id']}}">{{$meta['name']}}</option>
                        @endforeach
                    </select>

                </div>
            @elseif($step==3)
                <div class="wrap" data-validate="">

                    <select class="input select" wire:model="cert">
                        <option>انتخاب کنید</option>

                        @foreach($meta['step4'] as $meta)
                            <option>{{$meta}}</option>
                        @endforeach
                    </select>
                </div>

            @else
                @if (empty($accounts->father_name))
                    <div class="wrap-input100 validate-input">
                        <input class="input100" wire:model.lazy="father_name">
                        <span class="focus-input100"></span>
                        <span class="label-input100">نام پدر</span>
                    </div>
                @endif
                @if (empty($accounts->phone))
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="number" wire:model.lazy="phone">
                        <span class="focus-input100"></span>
                        <span class="label-input100">تلفن ثابت</span>
                    </div>
                @endif
                @if (empty($accounts->mobile))
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="number" wire:model.lazy="mobile">
                        <span class="focus-input100"></span>
                        <span class="label-input100">تلفن همراه</span>
                    </div>
                @endif
                @if (empty($accounts->certificate_id))
                    <div class="wrap-input100 validate-input">
                        <input class="input100" wire:model.lazy="certificate_id">
                        <span class="focus-input100"></span>
                        <span class="label-input100">شماره شناسنامه</span>
                    </div>
                @endif
                @if (empty($accounts->address))
                    <div class="wrap-input100 validate-input">
                        <input class="input100" wire:model.lazy="address">
                        <span class="focus-input100"></span>
                        <span class="label-input100">آدرس</span>
                    </div>
                @endif
                @if (empty($accounts->post_code))
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="number" wire:model.lazy="post_code">
                        <span class="focus-input100"></span>
                        <span class="label-input100">کد پستی</span>
                    </div>
                @endif
                @if (empty($accounts->export))
                    <div class="wrap-input100 validate-input">
                        <input class="input100" wire:model.lazy="export">
                        <span class="focus-input100"></span>
                        <span class="label-input100">محل صدور شناسنامه</span>
                    </div>
                @endif


            @endif


            <div class="container-login100-form-btn">
                <button class="login100-form-btn" wire:click="login">
                    {{$step==0?"ورود":"ادامه"}}
                </button>
            </div>
            <div class="flex-sb-m w-full p-t-3 p-b-32">
                @if ($step>0)
                    <a href="{{route('log')}}">
                        شروع مجدد
                    </a>

                @endif
                <a href="{{route('reg')}}">
                    ثبت نام
                </a>

            </div>


        </div>

    </div>

</div>
