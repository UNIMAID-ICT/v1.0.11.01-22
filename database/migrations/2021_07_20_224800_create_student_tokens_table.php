<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_id')->nullable()->constrained();
            $table->foreignId('student_id')->nullable()->constrained()->uniqid();
            $table->string('rrr')->nullable();
            $table->string('refrenceCode')->nullable();
            // $table->integer('cgpa')->nullable();
            // $table->integer('gpa')->nullable();
            // $table->string('student_status')->nullable();
            // $table->integer('no_carry_over')->nullable();
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
        Schema::dropIfExists('student_tokens');
    }
}
