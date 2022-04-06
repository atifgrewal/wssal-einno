<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('transport');
            $table->string('status');
            $table->decimal('cnic_no', 15, 2);
            $table->date('cnic_start_date');
            $table->date('cnic_expire_date');
            $table->string('store_name');
            $table->string('account_name');
            $table->decimal('current_balance', 15, 2);
            $table->integer('iban_no');
            $table->string('bank_name');
            $table->integer('swift_code');
            $table->integer('total_orders');
            $table->decimal('total_earning', 15, 2);
            $table->string('transport_no');
            $table->string('provider');
            $table->decimal('wal_amount', 15, 2)->nullable();
            $table->decimal('phone_no', 15, 2);
            $table->decimal('wal_mobile_no', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
