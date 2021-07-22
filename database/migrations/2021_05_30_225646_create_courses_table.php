<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->nullable()->constrained();
            $table->string("course_code")->nullable();
            $table->string("course_title")->nullable();
            $table->string("units")->nullable();
            $table->string("level")->nullable();
            $table->string("semester")->nullable();
            $table->string("mode")->nullable();
            $table->string("elective")->nullable();
            $table->string("pre_requisite")->nullable();
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
        Schema::dropIfExists('courses');
    }
}
