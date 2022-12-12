<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MovieDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_details', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('poster_path');
            $table->integer('movie_id');
            $table->timestamps();
        });
       
        Schema::table('user_list_details', function (Blueprint $table) {
            $table->bigInteger('movie_details_id'); 
            $table->foreign('movie_details_id')->references('id')->on('movie_details')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_list_details');
        Schema::dropIfExists('movie_details');
        
    }
}
