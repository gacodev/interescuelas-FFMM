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
        Schema::create('team_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("participant_id");
            $table->foreign("participant_id")->references("id")->on("participants");
            $table->unsignedBigInteger("team_id");
            $table->foreign("team_id")->references("id")->on("teams");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_participants');
    }
};
