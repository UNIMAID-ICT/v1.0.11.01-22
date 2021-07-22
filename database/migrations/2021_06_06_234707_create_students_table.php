<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('department_id')->nullable()->constrained();
            $table->string('student_id_number')->unique();
            $table->string("title")->nullable();
            $table->string("fullname")->nullable();
            $table->string("gender")->nullable();
            $table->string("marital_status")->nullable();
            $table->string("telephone")->nullable();
            $table->string("email")->nullable();
            $table->text("student_profile_photo_path")->nullable();
            $table->string("nin")->nullable();
            $table->date("date_of_birth")->nullable();
            $table->string("country")->nullable();
            $table->string("state")->nullable();
            $table->string("lga")->nullable();
            $table->text("address")->nullable();
            $table->string("blood_group")->nullable();
            $table->string("disability")->nullable();
            $table->string("medical_condition")->nullable();
            $table->string("access_token")->nullable();
            $table->string("payment_token")->nullable();
            $table->string("level")->nullable();
            $table->string("entry_mode")->nullable();
            $table->string("entry_mode_number")->nullable();
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
        Schema::dropIfExists('students');
    }
}
