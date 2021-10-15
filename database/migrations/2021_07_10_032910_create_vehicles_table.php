<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            // $table->id();
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->string('brand_name');
            $table->integer('year_model');
            $table->string('model_type');
            $table->string('body_type');
            $table->integer('mileage');
            $table->string('fuel_type');
            $table->string('transmission');
            $table->string('drive_type');
            $table->string('color');
            $table->string('interior_color');
            $table->string('engine');
            $table->longText('vehicle_overview');
            $table->integer('price');
            $table->string('thumbnail');
            $table->longText('image')->nullable();
            $table->boolean('archive')->default(false);
            $table->string('status')->default('Available');
            $table->softDeletes();
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
        Schema::dropIfExists('vehicles');
    }
}
