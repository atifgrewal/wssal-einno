<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();


            $table->longText('description')->nullable();
            $table->string('featured')->nullable();
            $table->float('regular_price', 15, 2)->nullable();
            $table->float('sale_price', 15, 2)->nullable();
            $table->integer('sku')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('vendor')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
