<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImgNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_img_names', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('url');
            $table->timestamps();
            //foreign-keys
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_img_names');
    }
}
