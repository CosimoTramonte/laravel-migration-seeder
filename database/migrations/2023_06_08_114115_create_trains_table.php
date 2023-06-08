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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('agency');
            $table->string('departure-station');
            $table->string('arrival-station');
            $table->dateTime('departuretime');
            $table->dateTime('arrival-time');
            $table->smallInteger('train-code')->unsigned();
            $table->tinyInteger('number-of-carriages')->unsigned();
            $table->boolean('in-time')->default(1);
            $table->boolean('deleted')->default(0);
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
        Schema::dropIfExists('trains');
    }
};





// In orario
// deleted
