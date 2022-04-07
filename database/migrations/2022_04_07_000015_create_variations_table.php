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
            $table->string('name');
            $table->float('quantity', 15, 2);
            $table->decimal('price', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
