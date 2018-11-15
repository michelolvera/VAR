<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomicilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domiciles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address_number');
            $table->string('street');
            $table->string('between_streets');
            $table->string('neighborhood');
            $table->unsignedInteger('zip_code');
            $table->string('city');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            //foreign-keys
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domiciles');
    }
}
