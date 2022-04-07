<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('quantity', 15, 2);
            $table->decimal('payment', 15, 2);
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
