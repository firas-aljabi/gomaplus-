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
        Schema::create('gomasmarthouse.smarthouses', function (Blueprint $table) {
            $table->increments("id");
            $table->string('email');
            $table->string('cameras')->nullable();
            $table->string('alexa')->nullable();
            $table->string('optical_extension')->nullable();
            $table->string('Wire_extension')->nullable();
            $table->string('smart_TV')->nullable();
            $table->string('smart_light')->nullable();
            $table->string('living_room')->nullable();
            $table->string('living_room_2')->nullable();
            $table->string('bedroom_1')->nullable();
            $table->string('bedroom_2')->nullable();
            $table->string('bedroom_3')->nullable();
            $table->string('kitchen')->nullable();
            $table->string('detais')->nullable();
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
        Schema::dropIfExists('gomasmarthouse.smarthouses');
    }
};
