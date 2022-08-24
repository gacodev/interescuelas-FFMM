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
            $table->string('phone')->nullable()->nullable();
            $table->string('photo');
            $table->foreignId('blood_id')->constrained();
            $table->integer('weight')->default('0');
            $table->integer('height')->default('0');
            $table->date('birthday');
            $table->foreignId('type_doc_id')->constrained();
            $table->foreignId('gender_id')->constrained();
            $table->foreignId('force_id')->constrained();
            $table->foreignId('nationality_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('grade_id')->constrained();
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
