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
        Schema::create('discipline_participants', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('award_id')->nullable();
            $table->foreign('award_id')->references("id")->on("awards");

            $table->foreignId('discipline_id')->constrained();
            $table->foreignId('participant_id')->constrained();

            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id')->references("id")->on("teams");

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
        Schema::dropIfExists('discipline_participants');
    }
};
