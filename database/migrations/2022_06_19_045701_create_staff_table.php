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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("identification");

            $table->unsignedBigInteger("sport_id");
            $table->foreign("sport_id")->references("id")->on("sports");

            $table->unsignedBigInteger("grade_id");
            $table->foreign("grade_id")->references("id")->on("grades");

            $table->unsignedBigInteger("force_id");
            $table->foreign("force_id")->references("id")->on("forces");


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
        Schema::dropIfExists('staff');
    }
};
