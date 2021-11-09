<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('location_id')->nullable();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('age')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('contact_num');
            $table->string('address');
            $table->string('gender')->nullable();
            // $table->string('region')->nullable();
            // $table->string('province')->nullable();
            // $table->string('city')->nullable();
            // $table->string('barangay')->nullable();
            // $table->string('postal_code')->nullable();
            // $table->string('street_name')->nullable();
            // $table->string('building')->nullable();
            // $table->string('house_num')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('status')->default('Active');
            $table->boolean('Customer')->default(false);
            $table->boolean('Admin')->default(false);
            $table->boolean('Secretary')->default(false);
            $table->boolean('Manager')->default(false);
            $table->boolean('archive')->default(false);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
