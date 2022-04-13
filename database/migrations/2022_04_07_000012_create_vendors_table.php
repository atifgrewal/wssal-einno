<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('business_name')->unique();
            $table->string('status');
            $table->string('featured');
            $table->string('promoted');
            $table->string('email')->unique();
            $table->integer('phone');
            $table->string('address');
            $table->float('rating', 2, 1);
            $table->integer('payouts');
            $table->string('earning')->nullable();
            $table->integer('cod_balance');
            $table->integer('oniline_payment');
            $table->date('cid_expiry_data');
            $table->decimal('cid_no', 15, 2);
            $table->string('account_no');
            $table->datetime('opening_time');
            $table->datetime('closing_time');
            $table->string('business_type');
            $table->string('bank_name');
            $table->string('iban_no');
            $table->string('swift_code');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
