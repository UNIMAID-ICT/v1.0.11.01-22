<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_id')->nullable()->constrained();
            $table->foreignId('student_id')->nullable()->constrained();
               $table->string('course_id')->nullable();
               $table->string('semester')->nullable();
               $table->string('ca')->nullable();
               $table->string('exam')->nullable();
               $table->string('total')->nullable();
               $table->string('remark')->nullable();
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
        Schema::dropIfExists('exams');
    }
}
