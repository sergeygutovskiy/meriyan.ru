<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("info_id")->nullable()->unsigned()->index();
            
            $table->string("title");
            $table->text("description");
            
            $table->string("image_path");
            
            $table->integer("price");
            $table->integer("price_discount")->nullable();

            $table->timestamps();

            $table->foreign('info_id')->references('id')->on('tour_infos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
