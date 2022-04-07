<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubCatsTable extends Migration
{
    public function up()
    {
        Schema::table('sub_cats', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_cateory_id')->nullable();
            $table->foreign('parent_cateory_id', 'parent_cateory_fk_6365245')->references('id')->on('product_categories');
        });
    }
}
