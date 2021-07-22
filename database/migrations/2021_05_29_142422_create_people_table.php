<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string("title");
            $table->string("firstname");
            $table->string("middlename")->nullable();
            $table->string("surname")->nullable();
            $table->string("gender")->nullable();
            $table->string("marital_status")->nullable();
            $table->string("telephone")->nullable();
            $table->string("email")->nullable();
            $table->string("photo")->nullable();
            $table->string("nin")->nullable();
            $table->date("date_of_birth")->nullable();
            $table->date("place_of_birth")->nullable();
            $table->date("registered_domicile")->nullable();
            $table->string("citizenship")->nullable();
            $table->string("country")->nullable();
            $table->string("state")->nullable();
            $table->string("lga")->nullable();
            $table->text("address")->nullable();
            $table->text("blood_group")->nullable();
            $table->text("disability")->nullable();
            $table->text("medical_condition")->nullable();
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
        Schema::dropIfExists('people');
    }
}
