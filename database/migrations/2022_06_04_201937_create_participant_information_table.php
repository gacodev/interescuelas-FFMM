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
        Schema::create('participants', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('identification')->unique();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('blood_id')->nullable();
            $table->string('weight')->default('0');
            $table->string('height')->default('0');
            $table->string('birthday')->nullable();
            $table->string('type_doc_id');
            $table->string('gender_id');
            $table->string('force_id');
            $table->string('nationality_id');
            $table->string('discipline_id');
            $table->string('range_id')->nullable();
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
        Schema::dropIfExists('participants');
    }
};
