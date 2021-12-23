
<div class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						ثبت نام در سامانه امور سهام
					</span>
    <div class="form-holder" wire:>
        @if($signup_step==1)
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="fname">
                <span class="focus-input100"></span>
                <span class="label-input100">نام</span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="lname">
                <span class="focus-input100"></span>
                <span class="label-input100">نام خانوادگی</span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="father">
                <span class="focus-input100"></span>
                <span class="label-input100">نام پدر</span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="nat_id">
                <span class="focus-input100"></span>
                <span class="label-input100">کد ملی</span>
            </div>
        @elseif($signup_step==2)
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="phone">
                <span class="focus-input100"></span>
                <span class="label-input100">تلفن ثابت</span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="mobile">
                <span class="focus-input100"></span>
                <span class="label-input100">موبایل</span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="st_num">
                <span class="focus-input100"></span>
                <span class="label-input100">بخش عددی کد بورسی</span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="st_alp">
                <span class="focus-input100"></span>
                <span class="label-input100">بخش حرفی کد بورسی</span>
            </div>
        @else
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="stock_count">
                <span class="focus-input100"></span>
                <span class="label-input100">تعداد سهام حق تقدم</span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="cert_id">
                <span class="focus-input100"></span>
                <span class="label-input100">شماره شناسنامه</span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="address">
                <span class="focus-input100"></span>
                <span class="label-input100">ادرس پستی</span>
            </div>
            <div class="wrap-input100 validate-input" >
                <input class="input100" wire:model.lazy="post_code">
                <span class="focus-input100"></span>
                <span class="label-input100">کد پستی</span>
            </div>
        @endif
    </div>


    <div class="container-login100-form-btn">
        <button class="login100-form-btn" onclick="" wire:click="signup">
            مرحله بعد
        </button>
    </div>
    <br>
    @if ($signup_step>1)
        <div class="container-login100-form-btn">
            <button class="login100-form-btn" wire:click="beforeStep">
               مرحله قبل
            </button>
        </div>
    @endif
        <div class="flex-sb-m w-full p-t-3 p-b-32">

            <a href="{{route('log')}}">
                حساب دارم (ورود)
            </a>

        </div>
</div>
