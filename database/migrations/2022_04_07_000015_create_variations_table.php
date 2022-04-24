<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationsTable extends Migration
{
    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('product_id')->unsigned();
             $table->foreignId('prod_id')->references('id')->on('products')->onDelete('cascade');
            // $table->foreignId('attr_det_id')->references('id')->on('attributedetails')->onDelete('cascade');
            // $table->unsignedBigInteger('attr_det_id');
            // $table->foreign('attr_det_id')->references('id')->on('attributedetails');
            $table->string('name');
            $table->float('quantity', 15, 2);
            $table->decimal('price', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
