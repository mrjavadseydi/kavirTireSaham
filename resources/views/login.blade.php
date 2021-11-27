<div class="login100-form validate-form">
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
