<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeAttributedetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('attribute_attributedetail', function (Blueprint $table) {
            $table->unsignedBigInteger('attributedetail_id');
            $table->foreign('attributedetail_id', 'attributedetail_id_fk_6384436')->references('id')->on('attributedetails')->onDelete('cascade');
            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id', 'attribute_id_fk_6384436')->references('id')->on('attributes')->onDelete('cascade');
        });
    }
}
