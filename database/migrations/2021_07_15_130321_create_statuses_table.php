<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_id')->nullable()->constrained();
            $table->foreignId('student_id')->nullable()->constrained()->uniqid();
            $table->integer('cum_unit')->nullable();
            $table->integer('cum_prod')->nullable();
            $table->integer('cgpa')->nullable();
            $table->integer('gpa')->nullable();
            $table->string('student_status')->nullable();
            $table->integer('no_carry_over')->nullable();
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
        Schema::dropIfExists('statuses');
    }
}
