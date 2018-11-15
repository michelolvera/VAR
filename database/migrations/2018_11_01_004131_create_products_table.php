<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->unsignedInteger('subcategorie_id');
            $table->unsignedDecimal('price', 8, 2);
            $table->unsignedTinyInteger('discount_percent');
            $table->unsignedInteger('quantity');
            $table->boolean('pinned');
            $table->string('slug')->unique();
            $table->timestamps();
            //foreign-keys
            $table->foreign('subcategorie_id')->references('id')->on('subcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
