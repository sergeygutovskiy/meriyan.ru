<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateTableFeedbackBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_booking', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger("tour_id")->unsigned()->index();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');

            $table->string("name");
            $table->string("email");
            $table->string("phone");

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
        Schema::table('feedback_booking', function (Blueprint $table) {
            //
        });
    }
}
