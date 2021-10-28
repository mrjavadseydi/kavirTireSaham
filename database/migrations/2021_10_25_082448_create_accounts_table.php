<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('certificate')->comment('کد سهامدار');
            $table->string('first_name')->nullable()->comment('نام ');
            $table->string('last_name')->nullable()->comment('فامیل');
            $table->string('father_name')->nullable()->comment('نام پدر');
            $table->string('phone')->nullable()->comment('تلفن ثابت');
            $table->string('mobile')->nullable()->comment('موبایل');
            $table->string('certificate_id')->nullable()->comment('شماره شناسنامه');
            $table->string('stock_number')->comment('بخش عددی کد بورسی');
            $table->string('stock_alpha')->comment('بحش حرفی کد بورسی');
            $table->string('national_id')->comment('کد ملی');
            $table->text('address')->nullable()->comment('ادرس');
            $table->string('post_code')->nullable()->comment('کد پستی');
            $table->integer('all_stock')->comment('تعداد پذیرنده');
            $table->integer('current_stock')->comment('تعداد پذیره مطالبات');
            $table->integer('money_current_stock')->comment('تعداد پذیره  نقدی')->default(0)->nullable();
            $table->bigInteger('wallet')->comment('مطالبات')->default(0)->nullable();
            $table->bigInteger('withdraw')->comment('واریز نقدی')->default(0)->nullable();
            $table->bigInteger('total')->comment('جمع مبلغ')->default(0)->nullable();
            $table->boolean('has_login')->comment('ورود ؟')->default(false);
            $table->dateTime('last_login')->nullable()->comment('اخرین ورود');
            $table->string('last_ip')->nullable()->comment('اخرین ای پی');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
