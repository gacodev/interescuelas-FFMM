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
            $table->string('identification');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('blood_id')->nullable();
            $table->string('weight')->default('0')->nullable();
            $table->string('height')->default('0')->nullable();
            $table->string('birthday')->nullable();
            $table->string('type_doc_id');
            $table->string('gender_id');
            $table->string('force_id');
            $table->string('nationality_id');
            $table->string('discipline_id')->nullable();
            $table->string('range_id')->nullable();
            $table->unsignedBigInteger("team_id")->nullable();
            $table->foreign("team_id")->references("id")->on("teams");
            $table->unique(['identification', 'discipline_id', 'team_id']);
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
