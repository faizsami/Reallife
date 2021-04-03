<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_personal_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('profile_image');
            $table->string('sex');
            $table->date('dob');
            $table->string('alternate_mobile');
            $table->string('nominee_name')->nullable();
            $table->string('nominee_mobile')->nullable();
            $table->string('nominee_relation')->nullable();
            $table->string('gst')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('dist');
            $table->string('postal_code');
            $table->string('state');
            $table->string('country');
            $table->timestamps();

            //creating foreing Key
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
        Schema::dropIfExists('user_personal_details');
    }
}
