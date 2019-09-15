<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinets', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->bigIncrements('id');
            $table->text('email');
            $table->string('phone');
            $table->string('date_of_birth');
            $table->string('city_of_residence');
            $table->string('telegram');
            $table->bigInteger('user_id')->index();
            $table->text('about_self')->nullable();
            $table->text('images')->nullable();
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
        Schema::dropIfExists('cabinets');
    }
}
