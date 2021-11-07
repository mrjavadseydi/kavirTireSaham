<div class="form-structor">
    <div class="signup">
        <h2 class="form-title" id="signup">
            @if($step==0)
                ورود به سامانه سهام

            @elseif ($step==1)
                بخش حرفی کد بورسی خود را انتخاب کنید
            @elseif ($step==2)
                نام خود را انتخاب کنید
            @elseif($step==3)
                {{$msg}}
            @elseif($step==4)
            @endif


        </h2>
        <form wire:submit.prevent="login">

            <div class="form-holder">
                @if ($step==0)
                    <input type="number" class="input" placeholder="بخش عددی کد بورسی" wire:model="stock_number"/>

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
            <button class="submit-btn">{{$step==0?"ورود":"ادامه فرایند"}}</button>
        </form>

    </div>
    <div class="login slide-up">
        <div class="center">
            <h2 class="form-title" id="login">ثبت نام</h2>
            <div class="form-holder">
                @if($signup==0)
                    <input type="text" class="input" placeholder="نام"/>
                    <input type="text" class="input" placeholder="نام خانوادگی"/>
                    <input type="text" class="input" placeholder="کد سهامدار"/>
                    <input type="text" class="input" placeholder="نام پدر"/>
                    <input type="text" class="input" placeholder="کد ملی"/>
                @elseif($step==1)
                    <input type="text" class="input" placeholder="تلفن ثابت"/>
                    <input type="text" class="input" placeholder="موبایل"/>
                    <input type="text" class="input" placeholder="بخش عددی کد بورسی"/>
                    <input type="text" class="input" placeholder="بخش حرفی کد بورسی"/>
                    <input type="text" class="input" placeholder="کد پستی"/>
                    <input type="text" class="input" placeholder="کد پستی"/>
                @else
                    <input type="text" class="input" placeholder="کد پستی"/>
                    <input type="text" class="input" placeholder="کد پستی"/>
                    <input type="text" class="input" placeholder="Password"/>
                @endif
            </div>
            <button class="submit-btn">ثبت نام</button>
        </div>
    </div>
</div>
