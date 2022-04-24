<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductProductTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_product_tag', function (Blueprint $table) {
            // $table->Integer('product_id');
            $table->foreignId('product_id', 'product_id_fk_6364165')->references('id')->on('products')->onDelete('cascade');
            $table->Integer('product_tag_id')->unsigned();
            $table->foreign('product_tag_id', 'product_tag_id_fk_6364165')->references('id')->on('product_tags')->onDelete('cascade');
        });
    }
}
