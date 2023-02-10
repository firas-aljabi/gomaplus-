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
        Schema::create('gomasmarthouse.users_infos', function (Blueprint $table) {
            $table->increments("id");
     
            //onDelete('cascade') is for(if the user is deleted all of his listing will be deleted)
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('location');
            $table->string('phonenumber');
    
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
        Schema::dropIfExists('gomasmarthouse.users_infos');
    }
};
