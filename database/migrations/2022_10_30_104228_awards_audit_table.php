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
        Schema::create('discipline_awards_audit', function (Blueprint $table) {
            $table->id();
            $table->string('award_id')->nullable();
            $table->string('discipline_id')->nullable();
            $table->string('participant_id')->nullable();
            $table->string('team_id')->nullable();
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
        Schema::dropIfExists('discipline_awards_audit');
    }
};
