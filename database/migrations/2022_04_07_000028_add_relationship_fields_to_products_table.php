<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_6366999')->references('id')->on('product_categories');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id', 'sub_category_fk_6365263')->references('id')->on('sub_cats');
            // $table->unsignedBigInteger('variation_id')->nullable();
            // $table->foreign('variation_id', 'variation_fk_6377811')->references('id')->on('variations');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id', 'unit_fk_6377812')->references('id')->on('units');
        });
    }
}
