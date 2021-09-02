<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vehicle_id');
            $table->unsignedInteger('user_id');
            $table->string('contact_num');
            $table->string('address');
            $table->string('purchase_in');
            $table->string('financing_option');
            $table->string('car_loan_downpayment');
            $table->string('loan_duration');
            $table->string('message');
            $table->string('status')->default('Pending');
            $table->boolean('is_approved')->default(false);
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
        Schema::dropIfExists('quotes');
    }
}
