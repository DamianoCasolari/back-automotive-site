<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name', 150)->unique();
            $table->string('slug');
            $table->string('cover_image')->nullable();
            $table->string('cover_image2')->nullable();
            $table->string('cover_image3')->nullable();
            $table->string('cover_image4')->nullable();
            $table->string('cover_image5')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('km');
            $table->date('date_of_enrollment');
            $table->unsignedSmallInteger('brand');
            $table->string('model', 255);
            $table->string('fuel_type', 50)->nullable();
            $table->string('transmission', 50)->nullable();
            $table->unsignedSmallInteger('engine_displacement')->nullable();
            $table->unsignedSmallInteger('cv')->nullable();
            $table->unsignedTinyInteger('car_doors_number')->nullable();
            $table->string('color', 50)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
