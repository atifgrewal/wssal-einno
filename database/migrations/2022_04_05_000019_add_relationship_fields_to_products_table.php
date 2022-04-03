<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id', 'sub_category_fk_6365263')->references('id')->on('sub_cats');
// <<<<<<< HEAD:database/migrations/2022_04_05_000019_add_relationship_fields_to_products_table.php
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_6366999')->references('id')->on('product_categories');
// =======
            $table->unsignedBigInteger('variation_id')->nullable();
            $table->foreign('variation_id', 'variation_fk_6377811')->references('id')->on('variations');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id', 'unit_fk_6377812')->references('id')->on('units');
// >>>>>>> master:database/migrations/2022_04_06_000021_add_relationship_fields_to_products_table.php
        });
    }
}
