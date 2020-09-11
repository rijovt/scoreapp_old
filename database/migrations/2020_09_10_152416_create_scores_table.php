<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stud_id')->unsigned();            
            $table->foreign('stud_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger('course_id')->unsigned(); 
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->decimal('score', 2, 1);
            $table->timestamps();
            $table->unique(['stud_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
