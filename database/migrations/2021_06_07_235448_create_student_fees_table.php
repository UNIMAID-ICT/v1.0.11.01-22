<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained();
            $table->string('acceptance_fee')->nullable();
            $table->string('benevolent_fee')->nullable();
            $table->string('caution_fee')->nullable();
            $table->string('department_fee')->nullable();
            $table->string('faculty_fee')->nullable();
            $table->string('university_fee')->nullable();
            $table->string('exam_fee')->nullable();
            $table->string('gst_fee')->nullable();
            $table->string('handbook_fee')->nullable();
            $table->string('ict_fee')->nullable();
            $table->string('idcard_fee')->nullable();
            $table->string('insurance_fee')->nullable();
            $table->string('lab_fee')->nullable();
            $table->string('lib_fee')->nullable();
            $table->string('medical_fee')->nullable();
            $table->string('mis_fee')->nullable();
            $table->string('result_fee')->nullable();
            $table->string('sports_fee')->nullable();
            $table->string('union_fee')->nullable();
            $table->string('tuition_fee')->nullable();

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
        Schema::dropIfExists('student_fees');
    }
}
