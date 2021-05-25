<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_infos', function (Blueprint $table) {
            $table->id();
            
            $table->integer("duration");
            $table->integer("people_amount");

            $table->unsignedBigInteger("season_id")->unsigned()->index();
            $table->unsignedBigInteger("complexity_id")->unsigned()->index();

            $table->text("description");
            $table->string("video_path");

            $table->timestamps();

            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');
            $table->foreign('complexity_id')->references('id')->on('complexities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_infos');
    }
}
