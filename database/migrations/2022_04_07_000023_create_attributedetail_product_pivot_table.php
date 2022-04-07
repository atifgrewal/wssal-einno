<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributedetailProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('attributedetail_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_6384545')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('attributedetail_id');
            $table->foreign('attributedetail_id', 'attributedetail_id_fk_6384545')->references('id')->on('attributedetails')->onDelete('cascade');
        });
    }
}
